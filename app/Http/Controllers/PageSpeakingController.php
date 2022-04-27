<?php

namespace App\Http\Controllers;

use App\Actions\GetTalksAction;
use Illuminate\Http\Request;

class PageSpeakingController extends Controller
{
    public function __invoke(Request $request)
    {
        [$pastTalks, $futureTalks] = (new GetTalksAction())->handle();

        return view('pages.speaking', ['futureTalks' => $futureTalks, 'pastTalks' => $pastTalks]);
    }
}
