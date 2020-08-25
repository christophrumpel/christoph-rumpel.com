<?php

namespace App\Http\Controllers;

use App\Post\PostCollector;
use Illuminate\Http\Request;

class PagePostController extends Controller
{

    public function __invoke(Request $request, $year, $month, $slug)
    {
        $post = PostCollector::findByPath($year, $month, $slug);

        if ( ! $post) {
            abort(404);
        }

        return view('pages.post', ['post' => $post]);
    }
}
