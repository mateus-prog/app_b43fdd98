<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Repositories\Contracts\AbstractRepositoryInterface', 
            'App\Repositories\Elouquent\ProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\AbstractRepositoryInterface', 
            'App\Repositories\Elouquent\ProductStockRepository'
        );
    }
}
