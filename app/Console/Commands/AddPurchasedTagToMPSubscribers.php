<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Mailcoach\Domain\Audience\Models\EmailList;
use Spatie\Mailcoach\Domain\Audience\Models\Subscriber;

class AddPurchasedTagToMPSubscribers extends Command
{
    protected $signature = 'mp:add-purchased-tags';

    protected $description = 'Add purchased tag to specific subscribers if given';

    public function handle(): void
    {
        collect()->each(function ($email) {
            $emailList = EmailList::findByUuid('aa3e9c66-331a-4fe5-9485-f9d93f873c8a');
            $subscriber = Subscriber::findForEmail($email, $emailList);

            if ($subscriber) {
                $subscriber->addTag('purchased');
            }
        });
    }
}
