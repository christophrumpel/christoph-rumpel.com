<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\MarkdownConverter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
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
            $languages = ['html', 'php', 'js', 'shell', 'shell'];

            $environment = new Environment();
            $environment->addExtension(new CommonMarkCoreExtension());
            $environment->addExtension(new TableExtension());

            $environment->addRenderer(FencedCode::class, new FencedCodeRenderer());
            $environment->addRenderer(IndentedCode::class, new IndentedCodeRenderer($languages));

            return new MarkdownConverter($environment);
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
