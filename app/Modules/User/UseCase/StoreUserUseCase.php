<?php

namespace App\Modules\User\UseCase;

use App\Models\User;
use App\Modules\User\DTO\UserStoreDTO;
use App\Modules\User\Task\PasswordHashTask;
use App\Repository\BaseEloquentRepository\BaseContracts\BaseWriteRepositoryInterface;
use App\Repository\UserRepository\Contracts\UserReadRepositoryInterface;
use Exception;

class StoreUserUseCase
{
    use PasswordHashTask;

    // space that we can use the repository from
    protected $repo;
    protected $userRepo;
    protected $user;

    public function __construct(BaseWriteRepositoryInterface $baseWriteRepository, UserReadRepositoryInterface $userReadRepository, User $user)
    {
        $this->repo = $baseWriteRepository;
        $this->userRepo = $userReadRepository;
        $this->user = $user;
    }

    /**
     * @throws Exception
     */
    public function execute(UserStoreDTO $DTO)
    {
        $user = $this->userRepo->setModel($this->user)->getByEmail($DTO->getEmail());
        if ($user) {
            throw new Exception('Email must be unique');
        }
        return $this->repo->setModel($this->user)->makeAndSave([
            //Можна и такой варант $DTO->toArray()
            'name' => $DTO->getName(),
            'email' => $DTO->getEmail(),
            'password' => $this->passwordHash($DTO->getPassword())
        ]);
    }
}
