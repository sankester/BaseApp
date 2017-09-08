<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
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
        parent::boot();
        /**
         * Start bind base app model
         */
        Route::bind('base/users', function ($id) {
            return \App\Model\User::all()->findOrFail($id);
        });

        Route::bind('base/portals', function ($id) {
            return \App\Model\Portal::all()->findOrFail($id);
        });

        Route::bind('base/roles', function ($id) {
            return \App\Model\Role::all()->findOrFail($id);
        });

        Route::bind('base/navs', function ($id) {
            return \App\Model\Nav::all()->findOrFail($id);
        });

        Route::bind('base/permissions', function ($id) {
            return \App\Model\Role::all()->findOrFail($id);
        });

        Route::bind('base/preferences', function ($id) {
            return \App\Model\Preference::all()->findOrFail($id);
        });
        /**
         * End bind base app model
         */

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
