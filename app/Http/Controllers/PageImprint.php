<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PageImprint extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.imprint');
    }
}
