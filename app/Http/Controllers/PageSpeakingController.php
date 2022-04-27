<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageSpeakingController extends Controller
{
    public function __invoke(Request $request)
    {
        $talks = json_decode(Storage::disk('talks')->get('talks.json'));

        [$pastTalks, $futureTalks] = collect($talks)
            ->transform(function ($talk) {
                $details = Str::of($talk->location);

                if (isset($talk->slides)) {
                    $details = $details->append(', <a href="' . $talk->slides . '">Slides</a>');
                }

                if (isset($talk->video)) {
                    $details = $details->append(", <a href='$talk->video'>Video</a>");
                }

                $details = $details->prepend('(')
                    ->append(')');

                $talk->date = Carbon::createFromFormat('d.m.Y', $talk->date);


                return tap($talk, fn($talk) => $talk->details = $details);
            })
            ->partition(function ($talk) {
                return $talk->date->isPast();
            });


        return view('pages.speaking', ['futureTalks' => $futureTalks, 'pastTalks' => $pastTalks]);
    }
}
