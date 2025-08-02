<?php
namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
 use Spatie\Permission\Middlewares\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register rate limiting
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60); // Adjust as needed
        });

        // Register Spatie role middleware
        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
    

        // Register the routes
        $this->routes(function () {
            Route::middleware('api')
                 ->prefix('api')
                 ->group(base_path('routes/api.php'));

            Route::middleware('web')
                 ->group(base_path('routes/web.php'));
        });
    }
}
