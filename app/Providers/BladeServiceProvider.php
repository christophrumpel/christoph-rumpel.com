<?php

namespace App\Providers;

use App\View\Components\MainLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::aliasComponent('layouts.main', MainLayout::class);
    }
}
