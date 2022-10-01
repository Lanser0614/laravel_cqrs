<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Modules\User\DTO\UserStoreDTO;
use App\Modules\User\UseCase\DeleteUserUseCase;
use App\Modules\User\UseCase\GetListUserUseCase;
use App\Modules\User\UseCase\GetOneUserUseCase;
use App\Modules\User\UseCase\StoreUserUseCase;
use App\Modules\User\UseCase\UpdateUserUseCase;

class UserController extends Controller
{
    public function index(GetListUserUseCase $getListUserUseCase)
    {
        return $getListUserUseCase->execute();
    }

    public function show($id, GetOneUserUseCase $getOneUserUseCase)
    {
        return $getOneUserUseCase->execute($id);
    }

    public function store(UserRequest $userRequest, StoreUserUseCase $storeUserUseCase)
    {
        return $storeUserUseCase->execute(UserStoreDTO::fromArray($userRequest->validated()));
    }

    public function update($id, UserUpdateRequest $userUpdateRequest, UpdateUserUseCase $updateUserUseCase)
    {
        return $updateUserUseCase->execute($id, UserStoreDTO::fromArray($userUpdateRequest->validated()));
    }


    public function delete($id, DeleteUserUseCase $deleteUserUseCase)
    {
        return $deleteUserUseCase->execute($id);
    }
}
