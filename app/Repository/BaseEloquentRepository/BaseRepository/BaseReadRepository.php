<?php

namespace App\Repository\BaseEloquentRepository\BaseRepository;

use App\Repository\BaseEloquentRepository\BaseContracts\BaseReadRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseReadRepository implements BaseReadRepositoryInterface
{
    protected $model;

    // Set the associated model
    public function setModel(Model $model): BaseReadRepositoryInterface
    {
        $this->model = $model->setConnection('mysql2')->newQuery();
        return $this;
    }

    public function all(): BaseReadRepositoryInterface
    {
        return $this->model->paginate();
    }


    // show the record with the given id
    public function show($id): BaseReadRepositoryInterface
    {
        return $this->model->findOrFail($id);
    }

    // Eager load database relationships

    /**
     * @param array $relations
     * @return mixed
     */
    public function with(array $relations): BaseReadRepositoryInterface
    {
        return $this->model->with($relations)->get();
    }

    // Get the associated model
    public function getModel(): Model
    {
        return $this->model;
    }
}
