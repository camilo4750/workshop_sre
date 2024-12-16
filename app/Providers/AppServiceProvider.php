<?php

namespace App\Providers;

use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Repositories\Geographic\CountryRepositoryInterface;
use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Interfaces\Repositories\Lists\Gender\GenderRepositoryInterface;
use App\Interfaces\Repositories\Lists\TypeDocument\TypeDocumentRepositoryInterface;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\Repositories\Supplier\SupplierStatusRepositoryInterface;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Interfaces\Services\Geographic\CountryServiceInterface;
use App\Interfaces\Services\Geographic\DepartmentServiceInterface;
use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;
use App\Interfaces\Services\Lists\Gender\GenderServiceInterface;
use App\Interfaces\Services\Lists\TypeDocument\TypeDocumentServiceInterface;
use App\Interfaces\Services\Supplier\SupplierServiceInterface;
use App\Interfaces\Services\Supplier\SupplierStatusServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Geographic\CountryRepository;
use App\Repositories\Geographic\DepartmentRepository;
use App\Repositories\Geographic\MunicipalityRepository;
use App\Repositories\Lists\Gender\GenderRepository;
use App\Repositories\Lists\TypeDocument\TypeDocumentRepository;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\Supplier\SupplierStatusRepository;
use App\Repositories\System\user\UserRepository;
use App\Services\Employee\EmployeeService;
use App\Services\Geographic\CountryService;
use App\Services\Geographic\DepartmentService;
use App\Services\Geographic\MunicipalityService;
use App\Services\Lists\Gender\GenderService;
use App\Services\Lists\TypeDocument\TypeDocumentService;
use App\Services\Supplier\SupplierService;
use App\Services\Supplier\SupplierStatusService;
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
        $this->app->bind(CountryServiceInterface::class, CountryService::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(DepartmentServiceInterface::class, DepartmentService::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(MunicipalityServiceInterface::class, MunicipalityService::class);
        $this->app->bind(MunicipalityRepositoryInterface::class, MunicipalityRepository::class);
        $this->app->bind(SupplierStatusServiceInterface::class, SupplierStatusService::class);
        $this->app->bind(SupplierStatusRepositoryInterface::class, SupplierStatusRepository::class);
        $this->app->bind(EmployeeServiceInterface::class, EmployeeService::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);    
        $this->app->bind(TypeDocumentServiceInterface::class, TypeDocumentService::class);
        $this->app->bind(TypeDocumentRepositoryInterface::class, TypeDocumentRepository::class); 
        $this->app->bind(GenderServiceInterface::class, GenderService::class);
        $this->app->bind(GenderRepositoryInterface::class, GenderRepository::class);    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
