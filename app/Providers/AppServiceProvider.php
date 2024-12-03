<?php

namespace App\Providers;

use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\services\Supplier\SupplierServiceInterface;
use App\Interfaces\services\User\UserServiceInterface;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\System\user\UserRepository;
use App\Services\Supplier\SupplierService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
