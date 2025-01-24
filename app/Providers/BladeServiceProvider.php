<?php

namespace App\Providers;

use App\View\Components\MainLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('layouts.main', MainLayout::class);
    }
}
