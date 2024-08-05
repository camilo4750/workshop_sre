<?php

namespace App\Providers;

use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\services\Supplier\SupplierServiceInterface;
use App\Repositories\Supplier\SupplierRepository;
use App\Services\Supplier\SupplierService;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
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
