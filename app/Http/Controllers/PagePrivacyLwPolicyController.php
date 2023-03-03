<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class PagePrivacyLwPolicyController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.privacy-policy-lw');
    }
}
