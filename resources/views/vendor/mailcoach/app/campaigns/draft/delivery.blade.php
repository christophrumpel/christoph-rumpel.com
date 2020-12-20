@extends('mailcoach::app.campaigns.draft.layouts.edit', [
    'campaign' => $campaign,
    'titlePrefix' => __('Delivery'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.campaigns.settings', $campaign) }}">
            <span class="breadcrumb">{{ $campaign->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Delivery') }}</span></li>
@endsection

@section('campaign')
    <form
        action="{{ route('mailcoach.campaigns.sendTestEmail', $campaign) }}"
        method="POST"
        data-dirty-check
    >
        @csrf

        <div class="flex items-end">
            <div class="flex-grow max-w-xl">
                <x-mailcoach::text-field
                    :label="__('Test your email first')"
                    :placeholder="__('Email(s) comma separated')"
                    name="emails"
                    :required="true"
                    type="text"
                    :value="cache()->get('mailcoach-test-email-addresses')"
                />
            </div>

            <button type="submit" class="ml-2 button">
                <x-mailcoach::icon-label icon="fa-paper-plane" :text="__('Send test')"/>
            </button>
        </div>
    </form>

    <div class="mt-12">
        @if($campaign->isReady())
            <h1 class="markup-h1">
                @if($campaign->scheduled_at)
                    {{ __('Scheduled for delivery at :scheduledAt', ['scheduledAt' => $campaign->scheduled_at->toMailcoachFormat()]) }}
                @else
                    {{ Illuminate\Support\Arr::random([
                        __('My time to shine!'),
                        __('No more time to waste…'),
                        __('Last part: deliver the thing!'),
                        __('Ready to handle the compliments?'),
                        __("Let's make some impact!"),
                        __("Allright, let's do this!"),
                        __('Everyone is sooo ready for this!'),
                        __('Inboxes will be surprised…'),
                    ]) }}
                @endif
            </h1>
            @if (! $campaign->htmlContainsUnsubscribeUrlPlaceHolder())
                <p class="mt-4 alert alert-warning">
                    {!! __('Campaign <strong>:campaign</strong> can be sent, but you might want to check your content.', ['campaign' => $campaign->name]) !!}
                </p>
            @else
                <p class="mt-4 alert alert-success">
                    {!! __('Campaign <strong>:campaign</strong> is ready to be sent.', ['campaign' => $campaign->name]) !!}
                </p>
            @endif
        @else
            <h1 class="markup-h1">{{ __('Almost there…') }}</h1>
            <p class="mt-4 alert alert-error">{{ __('You need to check some settings before you can deliver this campaign.') }}</p>
        @endif

        <dl
            class="mt-8 dl"
        >
            @if ($campaign->emailList)
                <dt>
                    <i class="fas fa-check text-green-500 mr-2"></i>
                    {{ __('From') }}:
                </dt>

                <dd>
                    {{ $campaign->emailList->default_from_email }} {{ $campaign->emailList->default_from_name ? "({$campaign->emailList->default_from_name})" : '' }}
                </dd>

                @if ($campaign->emailList->default_reply_to_email)
                    <dt>
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        {{ __('Reply-to') }}:
                    </dt>

                    <dd>
                        {{ $campaign->emailList->default_reply_to_email }} {{ $campaign->emailList->default_reply_to_name ? "({$campaign->emailList->default_reply_to_name})" : '' }}
                    </dd>
                @endif
            @endif

            <dt>
                @if($campaign->segmentSubscriberCount())
                    <i class="fas fa-check text-green-500 mr-2"></i>
                @else
                    <i class="fas fa-times text-red-500 mr-2"></i>
                @endif
                {{ __('To') }}:
            </dt>

            @if($campaign->emailListSubscriberCount())
                <dd>
                    {{ $campaign->emailList->name }}
                    @if($campaign->usesSegment())
                        ({{ $campaign->getSegment()->description() }})
                    @endif
                    <span class="counter text-xs">
                        {{ $campaign->segmentSubscriberCount() }}
                        <span class="ml-1 font-normal">
                            {{ trans_choice(__('subscriber|subscribers'), $campaign->segmentSubscriberCount()) }}
                        </span>
                    </span>
                </dd>
            @else
                <dd>
                    @if($campaign->emailList)
                        {{ __('Selected list has no subscribers') }}
                    @else
                        {{ __('No list selected') }}
                    @endif
                </dd>
            @endif

            <dt>
                @if($campaign->subject)
                    <i class="fas fa-check text-green-500 mr-2"></i>
                @else
                    <i class="fas fa-times text-red-500 mr-2"></i>
                @endif
                {{ __('Subject') }}:
            </dt>

            @if($campaign->subject)
                <dd>{{ $campaign->subject }}</dd>
            @else
                <dd>
                    {{ __('Subject is empty') }}
                </dd>
            @endif


            <dd class="col-start-2 pb-4 mb-2 border-b-2 border-gray-100">
                <a href="{{ route('mailcoach.campaigns.settings', $campaign) }}"
                   class="link-icon">
                    <x-mailcoach::icon-label icon="fa-pencil-alt" :text="__('Edit')"/>
                </a>
            </dd>

            <dt>
                @if($campaign->html && $campaign->hasValidHtml())
                    @if (! $campaign->htmlContainsUnsubscribeUrlPlaceHolder())
                        <i class="fas fa-exclamation-triangle text-orange-500 mr-2"></i>
                    @else
                        <i class="fas fa-check text-green-500 mr-2"></i>
                    @endif
                @else
                    <i class="fas fa-times text-red-500 mr-2"></i>
                @endif
                {{ __('Content') }}:
            </dt>


            @if($campaign->html && $campaign->hasValidHtml())
                <dd>
                    @if (! $campaign->htmlContainsUnsubscribeUrlPlaceHolder())
                        <p class="markup-code">
                            {{ __("Without a way to unsubscribe, there's a high chance that your subscribers will complain.") }}
                            {!! __('Consider adding the <code>::unsubscribeUrl::</code> placeholder.') !!}
                        </p>
                    @else
                        <p class="markup-code">
                            {{ __('Content seems fine.') }}
                        </p>
                    @endif
                </dd>

            @else
                <dd>
                    @if(empty($campaign->html))
                        {{ __('Content is missing') }}
                    @else
                        {{ __('HTML is invalid') }}
                    @endif
                </dd>
            @endif

            <dd class="col-start-2 pb-4 mb-2 border-b-2 border-gray-100 buttons gap-4">
                <a href="{{ route('mailcoach.campaigns.content', $campaign) }}"
                   class="link-icon">
                    <x-mailcoach::icon-label icon="fa-pencil-alt" :text="__('Edit')"/>
                </a>

                @if($campaign->html && $campaign->hasValidHtml())
                    <button type="button" class="link-icon" data-modal-trigger="preview">
                        <x-mailcoach::icon-label icon="fa-eye" :text="__('Preview')"/>
                    </button>
                    <x-mailcoach::modal :title="__('Preview')" name="preview" large>
                        <iframe class="absolute" width="100%" height="100%"
                                src="data:text/html;base64,{{ base64_encode($campaign->html) }}"></iframe>
                    </x-mailcoach::modal>
                @endif
            </dd>

            @if ($campaign->isReady())
                <dt>
                    @if($campaign->scheduled_at)
                        <i class="fas fa-clock text-orange-500 mr-2"></i>
                    @else
                        <i class="fas fa-clock mr-2"></i>
                    @endif
                    {{ __('Timing') }}
                </dt>

                <dd>
                    @if($campaign->scheduled_at)
                        <form method="POST" action="{{ route('mailcoach.campaigns.unschedule', $campaign) }}">
                            @csrf
                            <p class="mb-3">
                                {{ __('This campaign is scheduled to be sent at') }}

                                <strong>{{ $campaign->scheduled_at->toMailcoachFormat() }}</strong>.
                            </p>
                            <button type="submit" class="link-icon">
                                <x-mailcoach::icon-label icon="fa-ban" :text="__('Unschedule')"/>
                            </button>
                        </form>
                    @else
                        <div class="">
                            <div class="radio-group">
                                <x-mailcoach::radio-field
                                    name="schedule"
                                    option-value="now"
                                    :value="$campaign->scheduled_at ? 'future' : 'now'"
                                    :label="__('Send immediately')"
                                    dataConditional="schedule"
                                />
                                <x-mailcoach::radio-field
                                    name="schedule"
                                    option-value="future"
                                    :value="($campaign->scheduled_at || $errors->first('scheduled_at')) ? 'future' : 'now'"
                                    :label="__('Schedule for delivery in the future')"
                                    dataConditional="schedule"
                                />
                            </div>

                            <form
                                method="POST"
                                action="{{ route('mailcoach.campaigns.schedule', $campaign) }}"
                                data-conditional-schedule="future"
                            >
                                @csrf
                                <div class="mt-6 flex items-end">
                                    <x-mailcoach::date-time-field :name="'scheduled_at'" :value="optional($campaign->scheduled_at)->setTimezone(config('app.timezone'))" required />

                                    <button type="submit" class="ml-6 button bg-orange-500 hover:bg-orange-600 focus:bg-orange-600">
                                        <x-mailcoach::icon-label icon="fa-clock" :text="__('Schedule delivery')"/>
                                    </button>
                                </div>
                                <p class="mt-2 text-xs text-gray-300">
                                    {{ __('All times in :timezone', ['timezone' => config('app.timezone')]) }}
                                </p>
                            </form>
                        </div>
                    @endif

                    <div
                        class="mt-6 buttons | {{ (optional($campaign->scheduled_at)->setTimezone(config('app.timezone')) || $errors->first('scheduled_at')) ? 'hidden' : '' }}"
                        data-conditional-schedule="now"
                    >
                        <button class="button" data-modal-trigger="send-campaign">
                            <x-mailcoach::icon-label icon="fa-paper-plane" :text="__('Send now')"/>
                        </button>
                    </div>
                    <x-mailcoach::modal name="send-campaign">
                        <div class="flex place-center">
                            <div class="horses-wrap">
                                <div class="horses">
                                    <div class="horses-back"><img src="{{ asset('vendor/mailcoach/images/horses-back.png') }}"></div>
                                    <div class="horse-01"><img src="{{ asset('vendor/mailcoach/images/horse-01.png') }}"></div>
                                    <div class="horse-02"><img src="{{ asset('vendor/mailcoach/images/horse-02.png') }}"></div>
                                </div>
                                <div class="horse-button">
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.campaigns.send', $campaign)"
                                        class="button bg-red-500 shadow-2xl text-lg h-12"
                                    >
                                        @if ($campaign->segmentSubscriberCount() === 1)
                                            <x-mailcoach::icon-label icon="fa-paper-plane" :text="__('Send :subscribers email', ['subscribers' => number_format($campaign->segmentSubscriberCount())])"/>
                                        @else
                                            <x-mailcoach::icon-label icon="fa-paper-plane" :text="__('Send :subscribers emails', ['subscribers' => number_format($campaign->segmentSubscriberCount())])"/>
                                        @endif
                                    </x-mailcoach::form-button>
                                </div>
                            </div>
                        </div>
                    </x-mailcoach::modal>
                </dd>
            @endif
        </dl>
    </div>

@endsection
