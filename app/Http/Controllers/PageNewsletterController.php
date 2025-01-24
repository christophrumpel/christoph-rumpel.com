<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageNewsletterController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.newsletter');
    }
}
