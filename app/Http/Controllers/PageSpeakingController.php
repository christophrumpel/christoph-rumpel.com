<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Actions\GetTalksAction;
use Illuminate\Http\Request;

class PageSpeakingController extends Controller
{
    public function __invoke(Request $request): View
    {
        [$pastTalks, $futureTalks] = resolve(GetTalksAction::class)->handle();

        return view('pages.speaking', ['futureTalks' => $futureTalks, 'pastTalks' => $pastTalks]);
    }
}
