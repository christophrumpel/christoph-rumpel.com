<?php

namespace App\Http\Controllers;

use App\Post\PostCollector;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\Table\TableExtension;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class PagePostController extends Controller
{
    public function __invoke(Request $request, $year, $month, $slug)
    {
        $post = PostCollector::findByPath($year, $month, $slug);

        if (! $post) {
            abort(404);
        }

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addBlockRenderer(FencedCode::class, new FencedCodeRenderer());
        $environment->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer());
        $environment->addExtension(new TableExtension());

        $commonMarkConverter = new CommonMarkConverter([], $environment);

        return view('pages.post', ['post' => $post, 'converter' => $commonMarkConverter]);
    }
}
