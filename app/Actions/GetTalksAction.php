<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GetTalksAction
{
    public function handle(): Collection
    {
        $talks = json_decode(Storage::disk('talks')->get('talks.json'));

        if(empty($talks)) {
            return collect([[], []]);
        }

        return collect($talks)
            ->transform(function ($talk) {

                $talk->details = $this->createTalkDetails($talk);
                $talk->date = Carbon::createFromFormat('d.m.Y', $talk->date);

                return $talk;
            })
            ->partition(function ($talk) {
                return $talk->date->isPast();
            });
    }

    protected function createTalkDetails($talk): mixed
    {
        return Str::of($talk->location)
            ->when(
                isset($talk->slides),
                fn($string) => $string->append(', <a href="' . $talk->slides . '">Slides</a>'))
            ->when(
                isset($talk->video),
                fn($string) => $string->append(", <a href='$talk->video'>Video</a>"))
            ->prepend('(')
            ->append(')');
    }
}
