<?php

namespace App\Http\Controllers;

use App\Post\PostCollector;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home');
    }
}
