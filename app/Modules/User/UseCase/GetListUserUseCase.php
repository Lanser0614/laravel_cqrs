<?php

namespace App\Modules\User\UseCase;

use App\Models\User;
use App\Repository\BaseEloquentRepository\BaseContracts\BaseReadRepositoryInterface;

class GetListUserUseCase
{
    // space that we can use the repository from
    protected $repo;
    protected $user;

    public function __construct(BaseReadRepositoryInterface $baseReadRepository, User $user)
    {
        $this->repo = $baseReadRepository;
        $this->user = $user;
    }

    public function execute()
    {
        return $this->repo->setModel($this->user)->all();
    }


}
