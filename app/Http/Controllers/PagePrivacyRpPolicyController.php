<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PagePrivacyRpPolicyController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.privacy-policy-rp');
    }
}
