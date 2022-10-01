<?php

namespace App\Providers;

use App\Repository\BaseEloquentRepository\BaseContracts\BaseReadRepositoryInterface;
use App\Repository\BaseEloquentRepository\BaseContracts\BaseWriteRepositoryInterface;
use App\Repository\BaseEloquentRepository\BaseRepository\BaseReadRepository;
use App\Repository\BaseEloquentRepository\BaseRepository\BaseWriteRepository;
use App\Repository\UserRepository\Contracts\UserReadRepositoryInterface;
use App\Repository\UserRepository\UserReadRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseReadRepositoryInterface::class, BaseReadRepository::class);
        $this->app->bind(BaseWriteRepositoryInterface::class, BaseWriteRepository::class);
        $this->app->bind(UserReadRepositoryInterface::class, UserReadRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
