<?php

namespace App\Http\Controllers;

class PageNewsletterController extends Controller
{
    public function __invoke()
    {
        return view('pages.newsletter');
    }
}
