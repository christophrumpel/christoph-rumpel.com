<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PagePrivacyMpPolicyController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.privacy-policy-mp');
    }
}
