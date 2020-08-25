<?php

namespace App\Http\Controllers;

use App\HeadingRenderer;
use App\Post\PostCollector;
use App\TabbedCodeBlock;
use App\TabbedCodeRenderer;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\Heading;
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

        if ( ! $post) {
            abort(404);
        }

        $view = view('pages.post', ['post' => $post]);

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addBlockRenderer(FencedCode::class, new FencedCodeRenderer());
        $environment->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer());
        $environment->addBlockRenderer(TabbedCodeBlock::class, new TabbedCodeRenderer());
        $environment->addBlockRenderer(Heading::class, new HeadingRenderer());
        $environment->addExtension(new TableExtension());

        $commonMarkConverter = new CommonMarkConverter([], $environment);


        dd($this->renderViewAgain($view)->render());
    }

    protected function renderViewAgain($contents): \Illuminate\Contracts\View\View
    {
        $directory = Container::getInstance()['config']->get('view.compiled');

        if ( ! file_exists($viewFile = $directory.'/'.sha1($contents).'.blade.php')) {
            if ( ! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            file_put_contents($viewFile, $contents);
        }

        return View::file($viewFile);
    }
}
