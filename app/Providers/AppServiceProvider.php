<?php

namespace App\Providers;

use App\Repositories\Contracts\ClickRepositoryInterface;
use App\Repositories\Contracts\ProviderRepositoryInterface;
use App\Repositories\Eloquent\ClickRepository;
use App\Repositories\Eloquent\ProviderRepository;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClickRepositoryInterface::class, ClickRepository::class);
        $this->app->bind(ProviderRepositoryInterface::class, ProviderRepository::class);
    }
}
