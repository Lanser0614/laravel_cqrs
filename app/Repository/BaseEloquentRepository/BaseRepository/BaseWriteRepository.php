<?php

namespace App\Repository\BaseEloquentRepository\BaseRepository;

use App\Repository\BaseEloquentRepository\BaseContracts\BaseWriteRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseWriteRepository implements BaseWriteRepositoryInterface
{
    protected $model;

    // Set the associated model
    public function setModel(Model $model): static
    {
        $this->model = $model->setConnection('mysql')->newQuery();
        return $this;
    }

    public function makeAndSave(array $data)
    {
        return $this->model->make($data)->save();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
