<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageSpeakingController extends Controller
{
    public function __invoke(Request $request)
    {
        $talks = json_decode(Storage::disk('talks')->get('talks.json'));

        $talks = $this->preparePastTalksDetails($talks);

        return view('pages.speaking', ['talks' => $talks]);
    }

    private function preparePastTalksDetails($talks)
    {
        $pastTalks = collect($talks->past)->transform(function ($talk) {
            $details = Str::of($talk->location);

            if (isset($talk->slides)) {
                $details = $details->append(', <a href="'.$talk->slides.'">Slides</a>');
            }

            if (isset($talk->video)) {
                $details = $details->append(", <a href='$talk->video'>Video</a>");
            }

            $details = $details->prepend('(')
                ->append(')');


            return tap($talk, fn ($talk) => $talk->details = $details);
        });

        return tap($talks, fn ($talks) => $talks->past = $pastTalks);
    }
}
