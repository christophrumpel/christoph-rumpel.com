@extends('mailcoach::app.campaigns.sent.layouts.show', ['campaign' => $campaign])

@section('breadcrumbs')
    <li><span class="breadcrumb">{{ $campaign->name }}</span></li>
@endsection

@section('campaign')
    <div @if(!$campaign->sent_at || $campaign->sent_at->addDay()->isFuture()) id="campaign-summary" data-poll @endif>
        @if((! $campaign->isSent()) || (! $campaign->wasSentToAllSubscribers()))
            @if (! $campaign->sent_to_number_of_subscribers)
                <div class="progress-bar">
                    <div class="progress-bar-value" style="width:0"></div>
                </div>

                <div class="mt-4 flex alert alert-info">
                    <div class="mr-2">
                        <i class="fas fa-sync fa-spin text-blue-500"></i>
                    </div>
                    <div>
                        {{ __('Campaign') }}
                        <a target="_blank" href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

                        {{ __('is preparing to send to') }}

                        @if($campaign->emailList)
                            <a href="{{ route('mailcoach.emailLists.subscribers', $campaign->emailList) }}">{{ $campaign->emailList->name }}</a>
                        @else
                            &lt;{{ __('deleted list') }}&gt;
                        @endif
                    </div>
                </div>
            @elseif ($campaign->isCancelled())
                <div class="progress-bar">
                    <div class="progress-bar-value" style="width:{{ ($campaign->sendsCount() / $campaign->sent_to_number_of_subscribers) * 100 }}%"></div>
                </div>
                <div class="mt-4 flex alert alert-info">
                    <div class="mr-2">
                        <i class="fas fa-ban text-red-500"></i>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p>
                            <span class="inline-block">{{ __('Campaign') }}</span>
                            <a class="inline-block" target="_blank" href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

                            {{ __('sending is cancelled.', [
                                'sendsCount' => $campaign->sendsCount(),
                                'sentToNumberOfSubscribers' => $campaign->sent_to_number_of_subscribers,
                                'subscriber' => trans_choice(__('subscriber|subscribers'), $campaign->sent_to_number_of_subscribers)
                            ]) }}

                            {{ __('It was sent to :sendsCount/:sentToNumberOfSubscribers :subscriber of', [
                                'sendsCount' => $campaign->sendsCount(),
                                'sentToNumberOfSubscribers' => $campaign->sent_to_number_of_subscribers,
                                'subscriber' => trans_choice(__('subscriber|subscribers'), $campaign->sent_to_number_of_subscribers)
                            ]) }}

                            @if($campaign->emailList)
                                <a href="{{ route('mailcoach.emailLists.subscribers', $campaign->emailList) }}">{{ $campaign->emailList->name }}</a>
                            @else
                                &lt;{{ __('deleted list') }}&gt;
                            @endif
                            @if($campaign->usesSegment())
                                ({{ $campaign->segment_description }})
                            @endif
                        </p>
                    </div>
                </div>
            @else
                <div class="progress-bar">
                    <div class="progress-bar-value" style="width:{{ ($campaign->sendsCount() / $campaign->sent_to_number_of_subscribers) * 100 }}%"></div>
                </div>
                <div class="mt-4 flex alert alert-info">
                    <div class="mr-2">
                        <i class="fas fa-sync fa-spin text-blue-500"></i>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p>
                            <span class="inline-block">{{ __('Campaign') }}</span>
                            <a class="inline-block" target="_blank" href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

                            {{ __('is sending to :sendsCount/:sentToNumberOfSubscribers :subscriber of', [
                                'sendsCount' => $campaign->sendsCount(),
                                'sentToNumberOfSubscribers' => $campaign->sent_to_number_of_subscribers,
                                'subscriber' => trans_choice(__('subscriber|subscribers'), $campaign->sent_to_number_of_subscribers)
                            ]) }}

                            @if($campaign->emailList)
                                <a href="{{ route('mailcoach.emailLists.subscribers', $campaign->emailList) }}">{{ $campaign->emailList->name }}</a>
                            @else
                                &lt;{{ __('deleted list') }}&gt;
                            @endif
                            @if($campaign->usesSegment())
                                ({{ $campaign->segment_description }})
                            @endif
                        </p>

                        @if ($campaign->send_batch_id)
                            <x-mailcoach::form-button class="text-red-500 underline" action="{{ route('mailcoach.campaigns.cancel-sending', $campaign) }}" dataConfirm dataConfirmText="{{ __('Are you sure you want to cancel sending this campaign?') }}">Cancel</x-mailcoach::form-button>
                        @endif
                    </div>
                </div>
            @endif
        @else
            <div class="grid grid-cols-auto-1fr gap-2 alert alert-success">
                <div>
                    <i class="fas fa-check text-green-500"></i>
                </div>
                <div>
                    {{ __('Campaign') }}
                    <a target="_blank" href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

                    {{ __('was delivered successfully to') }}

                    <strong>{{ $campaign->sent_to_number_of_subscribers - ($failedSendsCount ?? 0) }} {{ trans_choice('subscriber|subscribers', $campaign->sent_to_number_of_subscribers) }}</strong>

                    {{ __('of') }}

                    @if($campaign->emailList)
                        <a href="{{ route('mailcoach.emailLists.subscribers', $campaign->emailList) }}">{{ $campaign->emailList->name }}</a>
                    @else
                        &lt;{{ __('deleted list') }}&gt;
                    @endif
                    @if($campaign->usesSegment())
                        ({{ $campaign->segment_description }})
                    @endif
                </div>

                @if($failedSendsCount)
                <div>
                    <i class="fas fa-times text-red-500"></i>
                </div>
                <div>
                    {{ __('Delivery failed for') }} <strong>{{ $failedSendsCount }}</strong> {{ trans_choice('subscriber|subscribers', $failedSendsCount) }}.
                    <a class="underline" href="{{ route('mailcoach.campaigns.outbox', $campaign) . '?filter[type]=failed' }}">{{ __('Check the outbox') }}</a>.
                </div>
                @endif

                <div class="col-start-2 text-sm text-green-600">{{ $campaign->sent_at->toMailcoachFormat() }}</div>
            </div>


            <h2 class="markup-h2 mt-12">{{ __('24-hour performance') }}</h2>

            <div class="mt-6">
                @include('mailcoach::app.campaigns.partials.chart')
            </div>
        @endif

        <hr class="border-t-2 border-gray-200 my-8">

        <h2 class="markup-h2">{{ __('Statistics') }}</h2>

        <div class="mt-6 grid grid-cols-3 gap-6 justify-start items-end max-w-xl">
            @if ($campaign->track_opens)
                <x-mailcoach::statistic :href="route('mailcoach.campaigns.opens', $campaign)" class="col-start-1"
                             numClass="text-4xl font-semibold" :stat="$campaign->unique_open_count" :label="__('Unique Opens')"/>
                <x-mailcoach::statistic :stat="$campaign->open_count" :label="__('Opens')"/>
                <x-mailcoach::statistic :stat="$campaign->open_rate / 100" :label="__('Open Rate')" suffix="%"/>
            @else
                <div class="col-start-1 col-span-3">
                    <div class="text-4xl font-semibold">–</div>
                    <div class="text-sm">{{ __('Opens not tracked') }}</div>
                </div>
            @endif

            @if($campaign->track_clicks)
                <x-mailcoach::statistic :href="route('mailcoach.campaigns.clicks', $campaign)" class="col-start-1"
                             numClass="text-4xl font-semibold" :stat="$campaign->unique_click_count" :label="__('Unique Clicks')"/>
                <x-mailcoach::statistic :stat="$campaign->click_count" :label="__('Clicks')"/>
                <x-mailcoach::statistic :stat="$campaign->click_rate / 100" :label="__('Click Rate')" suffix="%"/>
            @else
                <div class="col-start-1 col-span-3">
                    <div class="text-4xl font-semibold">–</div>
                    <div class="text-sm">{{ __('Clicks not tracked') }}</div>
                </div>
            @endif

            <x-mailcoach::statistic :href="route('mailcoach.campaigns.unsubscribes', $campaign)" numClass="text-4xl font-semibold"
                         :stat="$campaign->unsubscribe_count" :label="__('Unsubscribes')"/>
            <x-mailcoach::statistic :stat="$campaign->unsubscribe_rate / 100" :label="__('Unsubscribe Rate')" suffix="%"/>

            <x-mailcoach::statistic :href="route('mailcoach.campaigns.outbox', $campaign) . '?filter[type]=bounced'"
                         class="col-start-1" numClass="text-4xl font-semibold" :stat="$campaign->bounce_count"
                         :label="__('Bounces')"/>
            <x-mailcoach::statistic :stat="$campaign->bounce_rate / 100" :label="__('Bounce Rate')" suffix="%"/>

        </div>
    </div>
@endsection
