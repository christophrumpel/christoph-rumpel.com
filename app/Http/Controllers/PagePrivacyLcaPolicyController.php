<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PagePrivacyLcaPolicyController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.privacy-policy-lca');
    }
}
