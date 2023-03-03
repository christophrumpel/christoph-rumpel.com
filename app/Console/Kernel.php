<?php

namespace App\Console;

use App\Console\Commands\AddPurchasedTagToMPSubscribers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        AddPurchasedTagToMPSubscribers::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('mailcoach:send-automation-mails')->everyMinute()->withoutOverlapping()->runInBackground();
        $schedule->command('mailcoach:send-scheduled-campaigns')->everyMinute()->withoutOverlapping()->runInBackground();

        $schedule->command('mailcoach:run-automation-triggers')->everyMinute()->runInBackground();
        $schedule->command('mailcoach:run-automation-actions')->everyMinute()->runInBackground();

        $schedule->command('mailcoach:calculate-statistics')->everyMinute();
        $schedule->command('mailcoach:calculate-automation-mail-statistics')->everyMinute();
        $schedule->command('mailcoach:rescue-sending-campaigns')->hourly();
        $schedule->command('mailcoach:send-campaign-summary-mail')->hourly();
        $schedule->command('mailcoach:cleanup-processed-feedback')->hourly();
        $schedule->command('mailcoach:send-email-list-summary-mail')->mondays()->at('9:00');
        $schedule->command('mailcoach:delete-old-unconfirmed-subscribers')->daily();
        $schedule->command('horizon:snapshot')->everyFiveMinutes();
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run --only-db --disable-notifications')->daily()->at('02:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
