<?php

namespace App\Providers;

use App\Repositories\TaxRepository;
use App\Repositories\Interfaces\TaxRepositoryInterface;
use App\Services\TaxService;
use App\Services\Interfaces\TaxServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            TaxRepositoryInterface::class,
            TaxRepository::class
        );

        $this->app->bind(
            TaxServiceInterface::class,
            TaxService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
