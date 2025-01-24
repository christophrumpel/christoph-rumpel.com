<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;
use App\Providers\BladeServiceProvider;
use App\Providers\MarkdownConverterProvider;

return [

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\HorizonServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

        BladeServiceProvider::class,

        MarkdownConverterProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Redis' => Illuminate\Support\Facades\Redis::class,
    ])->toArray(),

];
