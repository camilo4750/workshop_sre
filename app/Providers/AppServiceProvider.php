<?php

namespace App\Providers;

use App\Interfaces\Repositories\Employee\EmployeeRepositoryInterface;
use App\Interfaces\Repositories\Geographic\CountryRepositoryInterface;
use App\Interfaces\Repositories\Geographic\DepartmentRepositoryInterface;
use App\Interfaces\Repositories\Geographic\MunicipalityRepositoryInterface;
use App\Interfaces\Repositories\Lists\Arl\ArlRepositoryInterface;
use App\Interfaces\Repositories\Lists\Bank\BankRepositoryInterface;
use App\Interfaces\Repositories\Lists\ContractType\ContractTypeRepositoryInterface;
use App\Interfaces\Repositories\Lists\Eps\EpsRepositoryInterface;
use App\Interfaces\Repositories\Lists\Gender\GenderRepositoryInterface;
use App\Interfaces\Repositories\Lists\JobPosition\JobPositionRepositoryInterface;
use App\Interfaces\Repositories\Lists\PensionFund\PensionFundRepositoryInterface;
use App\Interfaces\Repositories\Lists\TypeDocument\TypeDocumentRepositoryInterface;
use App\Interfaces\Repositories\Supplier\SupplierRepositoryInterface;
use App\Interfaces\Repositories\Supplier\SupplierStatusRepositoryInterface;
use App\Interfaces\Repositories\User\UserRepositoryInterface;
use App\Interfaces\Services\Employee\EmployeeServiceInterface;
use App\Interfaces\Services\Geographic\CountryServiceInterface;
use App\Interfaces\Services\Geographic\DepartmentServiceInterface;
use App\Interfaces\Services\Geographic\MunicipalityServiceInterface;
use App\Interfaces\Services\Lists\Arl\ArlServiceInterface;
use App\Interfaces\Services\Lists\Bank\BankServiceInterface;
use App\Interfaces\Services\Lists\ContractType\ContractTypeServiceInterface;
use App\Interfaces\Services\Lists\Eps\EpsServiceInterface;
use App\Interfaces\Services\Lists\Gender\GenderServiceInterface;
use App\Interfaces\Services\Lists\JobPosition\JobPositionServiceInterface;
use App\Interfaces\Services\Lists\PensionFund\PensionFundServiceInterface;
use App\Interfaces\Services\Lists\TypeDocument\TypeDocumentServiceInterface;
use App\Interfaces\Services\Supplier\SupplierServiceInterface;
use App\Interfaces\Services\Supplier\SupplierStatusServiceInterface;
use App\Interfaces\Services\User\UserServiceInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Geographic\CountryRepository;
use App\Repositories\Geographic\DepartmentRepository;
use App\Repositories\Geographic\MunicipalityRepository;
use App\Repositories\Lists\Arl\ArlRepository;
use App\Repositories\Lists\Bank\BankRepository;
use App\Repositories\Lists\ContractType\ContractTypeRepository;
use App\Repositories\Lists\Eps\EpsRepository;
use App\Repositories\Lists\Gender\GenderRepository;
use App\Repositories\Lists\JobPosition\JobPositionRepository;
use App\Repositories\Lists\PensionFund\PensionFundRepository;
use App\Repositories\Lists\TypeDocument\TypeDocumentRepository;
use App\Repositories\Supplier\SupplierRepository;
use App\Repositories\Supplier\SupplierStatusRepository;
use App\Repositories\System\user\UserRepository;
use App\Services\Employee\EmployeeService;
use App\Services\Geographic\CountryService;
use App\Services\Geographic\DepartmentService;
use App\Services\Geographic\MunicipalityService;
use App\Services\Lists\Arl\ArlService;
use App\Services\Lists\Bank\BankService;
use App\Services\Lists\ContractType\ContractTypeService;
use App\Services\Lists\Eps\EpsService;
use App\Services\Lists\Gender\GenderService;
use App\Services\Lists\JobPosition\JobPositionService;
use App\Services\Lists\PensionFund\PensionFundService;
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
        $this->app->bind(JobPositionServiceInterface::class, JobPositionService::class);
        $this->app->bind(JobPositionRepositoryInterface::class, JobPositionRepository::class);
        $this->app->bind(EpsServiceInterface::class, EpsService::class);
        $this->app->bind(EpsRepositoryInterface::class, EpsRepository::class);   
        $this->app->bind(PensionFundServiceInterface::class, PensionFundService::class);
        $this->app->bind(PensionFundRepositoryInterface::class, PensionFundRepository::class);
        $this->app->bind(ArlServiceInterface::class, ArlService::class);
        $this->app->bind(ArlRepositoryInterface::class, ArlRepository::class);
        $this->app->bind(ContractTypeServiceInterface::class, ContractTypeService::class);
        $this->app->bind(ContractTypeRepositoryInterface::class, ContractTypeRepository::class);
        $this->app->bind(BankServiceInterface::class, BankService::class);
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
