<?php

namespace App\Repository\BaseEloquentRepository\BaseContracts;

use Illuminate\Database\Eloquent\Model;

interface BaseReadRepositoryInterface
{
    public function setModel(Model $model): BaseReadRepositoryInterface;

    public function all(): BaseReadRepositoryInterface;

    public function show($id): BaseReadRepositoryInterface;

    public function with(array $relation): BaseReadRepositoryInterface;

    public function getModel(): Model;
}
