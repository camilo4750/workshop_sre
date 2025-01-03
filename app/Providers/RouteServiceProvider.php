<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/UserRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/SupplierRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/CountryRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/DepartmentRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/MunicipalityRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/SupplierStatusRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/EmployeeRoute.php'));
                
            Route::middleware('web')
                ->group(base_path('routes/App/TypeDocumentRoute.php'));
                
            Route::middleware('web')
                ->group(base_path('routes/App/GenderRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/JobPositionRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/EpsRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/PensionFundRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/ArlRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/ContractTypeRoute.php'));
                
            Route::middleware('web')
                ->group(base_path('routes/App/BankRoute.php'));

            Route::middleware('web')
                ->group(base_path('routes/App/EmployeeStatusRoute.php'));
        });
    }
}
