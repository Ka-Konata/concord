<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\Contracts\iAuthRepository;
use App\Services\AuthService;
use App\Services\Contracts\iAuthService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(iAuthService::class, AuthService::class);
        $this->app->bind(iAuthRepository::class, AuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
