<?php

namespace App\Repository\UserRepository\Contracts;

use App\Repository\BaseEloquentRepository\BaseContracts\BaseReadRepositoryInterface;

interface UserReadRepositoryInterface extends BaseReadRepositoryInterface
{
    public function getByEmail(string $email);
}
