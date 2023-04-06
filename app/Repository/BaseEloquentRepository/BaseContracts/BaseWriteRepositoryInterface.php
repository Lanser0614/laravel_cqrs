<?php

namespace App\Repository\BaseEloquentRepository\BaseContracts;

use Illuminate\Database\Eloquent\Model;

interface BaseWriteRepositoryInterface
{
    public function setModel(Model $model): BaseWriteRepositoryInterface;
    public function makeAndSave(array $data): Model;
    public function create(array $data): Model;
    public function update(array $data, $id): Model;
    public function delete($id);
}
