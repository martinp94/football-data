<?php

namespace App\Providers;

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
        view()->composer(['partials.left-sidebar', 'clubs.clubs-all'], function($view) {
            $view->with('countries', \App\Area::countries());
        });

        view()->composer('partials.left-sidebar', function($view) {
            $view->with('world', \App\Area::world());
        });

        view()->composer('partials.left-sidebar', function($view) {
            $view->with('continents', \App\Area::continents());
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
