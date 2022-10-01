<?php

namespace App\Repository\UserRepository;

use App\Repository\BaseEloquentRepository\BaseRepository\BaseReadRepository;
use App\Repository\UserRepository\Contracts\UserReadRepositoryInterface;

class UserReadRepository extends BaseReadRepository implements UserReadRepositoryInterface
{
    public function getByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
}
