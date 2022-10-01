<?php

namespace App\Repository\BaseEloquentRepository\BaseContracts;

use Illuminate\Database\Eloquent\Model;

interface BaseReadRepositoryInterface
{
    public function setModel(Model $model);

    public function all();

    public function show($id);

    public function with(array $relation);

    public function getModel();
}
