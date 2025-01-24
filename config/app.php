<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;
use App\Providers\BladeServiceProvider;
use App\Providers\MarkdownConverterProvider;

return [


    'aliases' => Facade::defaultAliases()->merge([
        'Redis' => Illuminate\Support\Facades\Redis::class,
    ])->toArray(),

];
