<div class="mt-6 grid grid-cols-3 gap-6 justify-start items-end max-w-xl">
    @if ($mail->track_opens)
        <x-mailcoach::statistic :href="route('mailcoach.automations.mails.opens', $mail)" class="col-start-1"
                     numClass="text-4xl font-semibold" :stat="number_format($mail->unique_open_count)" :label="__('Unique Opens')"/>
        <x-mailcoach::statistic :stat="number_format($mail->open_count)" :label="__('Opens')"/>
        <x-mailcoach::statistic :stat="$mail->open_rate / 100" :label="__('Open Rate')" suffix="%"/>
    @else
        <div class="col-start-1 col-span-3">
            <div class="text-4xl font-semibold">–</div>
            <div class="text-sm">{{ __('Opens not tracked') }}</div>
        </div>
    @endif

    @if($mail->track_clicks)
        <x-mailcoach::statistic :href="route('mailcoach.automations.mails.clicks', $mail)" class="col-start-1"
                     numClass="text-4xl font-semibold" :stat="number_format($mail->unique_click_count)" :label="__('Unique Clicks')"/>
        <x-mailcoach::statistic :stat="number_format($mail->click_count)" :label="__('Clicks')"/>
        <x-mailcoach::statistic :stat="$mail->click_rate / 100" :label="__('Click Rate')" suffix="%"/>
    @else
        <div class="col-start-1 col-span-3">
            <div class="text-4xl font-semibold">–</div>
            <div class="text-sm">{{ __('Clicks not tracked') }}</div>
        </div>
    @endif

    <x-mailcoach::statistic :href="route('mailcoach.automations.mails.unsubscribes', $mail)" numClass="text-4xl font-semibold"
                 :stat="number_format($mail->unsubscribe_count)" :label="__('Unsubscribes')"/>
    <x-mailcoach::statistic :stat="$mail->unsubscribe_rate / 100" :label="__('Unsubscribe Rate')" suffix="%"/>

    <x-mailcoach::statistic :href="route('mailcoach.automations.mails.outbox', $mail) . '?filter[type]=bounced'"
                 class="col-start-1" numClass="text-4xl font-semibold" :stat="number_format($mail->bounce_count)"
                 :label="__('Bounces')"/>
    <x-mailcoach::statistic :stat="$mail->bounce_rate / 100" :label="__('Bounce Rate')" suffix="%"/>
</div>
