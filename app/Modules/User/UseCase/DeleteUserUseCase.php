<?php

namespace App\Modules\User\UseCase;

use App\Models\User;
use App\Modules\User\DTO\UserStoreDTO;
use App\Repository\BaseEloquentRepository\BaseContracts\BaseWriteRepositoryInterface;
use App\Repository\UserRepository\Contracts\UserReadRepositoryInterface;
use Exception;

class DeleteUserUseCase
{

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
    public function execute($id)
    {
        $user = $this->userRepo->setModel($this->user)->show($id);
        if ($user) {
            return $this->repo->setModel($user)->delete($id);
        } else {
            throw new Exception('User not found');
        }

    }

}
