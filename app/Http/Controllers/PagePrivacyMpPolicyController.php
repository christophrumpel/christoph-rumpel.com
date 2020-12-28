<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagePrivacyMpPolicyController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('pages.privacy-policy-mp');
    }
}
