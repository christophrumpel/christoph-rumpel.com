<?php

namespace App\Providers;

use App\Services\HighlightCodeBlockRenderer;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class MarkdownConverterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommonMarkConverter::class, function ($app) {
            $environment = Environment::createCommonMarkEnvironment();
            $languages = ['html', 'php', 'js', 'shell', 'shell'];
            $environment->addBlockRenderer(FencedCode::class, new HighlightCodeBlockRenderer());
            $environment->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer($languages));
            $environment->addExtension(new TableExtension());

            return new CommonMarkConverter([], $environment);
        });
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
