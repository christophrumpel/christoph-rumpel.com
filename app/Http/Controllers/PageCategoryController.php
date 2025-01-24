<?php

namespace App\Http\Controllers;

use App\Post\PostCollector;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageCategoryController extends Controller
{
    public function __invoke(Request $request, $category): View
    {
        $posts = PostCollector::category($category);

        return view('pages.category', ['posts' => $posts, 'category' => $category]);
    }
}
