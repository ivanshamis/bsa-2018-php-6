<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\{CurrencyRepositoryInterface,CurrencyRepository,CurrencyGenerator};


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrencyRepositoryInterface::class, function($app) {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });
    }
}
