<?php

namespace App\Repository\BaseEloquentRepository\BaseContracts;

use Illuminate\Database\Eloquent\Model;

interface BaseWriteRepositoryInterface
{
    public function setModel(Model $model);
    public function makeAndSave(array $data);
    public function create( array $data);
    public function update(array $data, $id);
    public function delete($id);
}
