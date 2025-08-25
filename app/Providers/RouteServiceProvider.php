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
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */

    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
{
    $this->configureRateLimiting();

    $this->routes(function () {
        Route::namespace($this->namespace)->group(function(){
            // API Routes
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // IPN Routes
            Route::middleware('web')
                ->namespace('Gateway')
                ->prefix('ipn')
                ->name('ipn.')
                ->group(base_path('routes/ipn.php'));

            // Admin Routes
            Route::middleware('web')
                ->namespace('Admin')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));

            // User Routes
            Route::middleware('web')
                ->prefix('user')
                ->group(base_path('routes/user.php'));

            // Member Routes
            Route::middleware('web') // Add a prefix for member routes
                ->group(base_path('routes/member.php')); // Add the member routes file

            // Web Routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    });
}
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
