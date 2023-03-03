<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomMailcoachProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Gate::define('viewMailcoach', function ($user = null) {
            return $user;
        });
    }
}
