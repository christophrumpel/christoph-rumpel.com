<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageImprint extends Controller
{

    public function __invoke(Request $request)
    {
        return view('pages.imprint');
    }
}
