<?php

namespace App\Modules\User\Task;

use Illuminate\Support\Facades\Hash;

trait PasswordHashTask
{
    public function passwordHash(string $password): string
    {
        return Hash::make($password);
    }

}
