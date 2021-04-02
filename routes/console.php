<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

use Spatie\Mailcoach\Domain\Campaign\Models\Campaign;

Artisan::command('migrate-mailcoach-segments-for-v4', function () {
    Campaign::each(function (Campaign $campaign) {
        if ($campaign->segment_class === 'Spatie\Mailcoach\Support\Segments\SubscribersWithTagsSegment') {
            $campaign->update([
                'segment_class' => 'Spatie\Mailcoach\Domain\Audience\Support\Segments\SubscribersWithTagsSegment',
            ]);
        }

        if ($campaign->segment_class === 'Spatie\Mailcoach\Support\Segments\EverySubscriberSegment') {
            $campaign->update([
                'segment_class' => 'Spatie\Mailcoach\Domain\Audience\Support\Segments\EverySubscriberSegment',
            ]);
        }
    });
});
