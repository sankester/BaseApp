<?php

namespace App\Providers;

use App\Repositories\BaseApp\NavRepositories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // hook navigation
        view()->composer('layouts.admin.main-nav', function($view){
            $navs = new NavRepositories();
            $view->with('navs', $navs);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
