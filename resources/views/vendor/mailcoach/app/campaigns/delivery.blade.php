<x-mailcoach::layout-campaign :title="__('Send')" :campaign="$campaign">
    <div>
        @if ($campaign->isEditable())
            <div class="grid gap-2">
                @if($campaign->isReady())
                    @if($campaign->scheduled_at)
                        <x-mailcoach::warning>
                            {{ __('Scheduled for delivery at :scheduledAt', ['scheduledAt' => $campaign->scheduled_at->toMailcoachFormat()]) }}
                        </x-mailcoach::warning>
                    @endif

                    @if (! $campaign->htmlContainsUnsubscribeUrlPlaceHolder() || $campaign->sizeInKb() > 102)
                        <x-mailcoach::warning>
                            {!! __('Campaign <strong>:campaign</strong> can be sent, but you might want to check your content.', ['campaign' => $campaign->name]) !!}
                        </x-mailcoach::warning>
                    @else
                        <x-mailcoach::success>
                            {!! __('Campaign <strong>:campaign</strong> is ready to be sent.', ['campaign' => $campaign->name]) !!}
                        </x-mailcoach::success>
                    @endif
                @else
                    <x-mailcoach::error>
                        {{ __('You need to check some settings before you can deliver this campaign.') }}
                    </x-mailcoach::error>
                @endif
            </div>
        @endif

        <dl
            class="mt-8 dl"
        >
            @if ($campaign->emailList)
                <dt>
                    <x-mailcoach::health-label :test="true" :label="__('From')"/>
                </dt>

                <dd>
                    {{ $campaign->emailList->default_from_email }} {{ $campaign->emailList->default_from_name ? "({$campaign->emailList->default_from_name})" : '' }}
                </dd>

                @if ($campaign->emailList->default_reply_to_email)
                    <dt>
                        <x-mailcoach::health-label :test="true" :label="__('Reply-to')"/>
                    </dt>

                    <dd>
                        {{ $campaign->emailList->default_reply_to_email }} {{ $campaign->emailList->default_reply_to_name ? "({$campaign->emailList->default_reply_to_name})" : '' }}
                    </dd>
                @endif

                <dt>
                    <x-mailcoach::health-label :test="$campaign->segmentSubscriberCount()" :label="__('To')"/>
                </dt>

                <dd>
                    @if($campaign->emailListSubscriberCount())
                        <div>
                            {{ $campaign->emailList->name }}
                            @if($campaign->usesSegment())
                                ({{ $campaign->getSegment()->description() }})
                            @endif
                            <span class="ml-2 tag-neutral text-xs">
                                {{ $campaign->segmentSubscriberCount() }}
                                <span class="ml-1 font-normal">
                                    {{ trans_choice(__('subscriber|subscribers'), $campaign->segmentSubscriberCount()) }}
                                </span>
                            </span>
                        </div>
                    @elseif($campaign->emailList)
                        {{ __('Selected list has no subscribers') }}
                    @else
                        {{ __('No list selected') }}
                    @endif
                </dd>
            @endif

            <dt>
                <x-mailcoach::health-label :test="$campaign->subject" :label="__('Subject')"/>
            </dt>

            <dd>
                {{ $campaign->subject ?? __('Subject is empty') }}
            </dd>

            <dt>
                @if($campaign->html && $campaign->hasValidHtml())
                    <x-mailcoach::health-label
                        :test="$campaign->htmlContainsUnsubscribeUrlPlaceHolder() && $campaign->sizeInKb() < 102"
                        warning="true"
                        :label="__('Content')"/>
                @else
                    <x-mailcoach::health-label :test="false" :label="__('Content')"/>
                @endif
            </dt>


            <dd class="grid gap-4">
                @if($campaign->html && $campaign->hasValidHtml())
                    @if ($campaign->htmlContainsUnsubscribeUrlPlaceHolder() && $campaign->sizeInKb() < 102)
                        <p class="markup-code">
                            {{ __('Content seems fine.') }}
                        </p>
                    @else
                        @if (! $campaign->htmlContainsUnsubscribeUrlPlaceHolder())
                            <p class="markup-code">
                                {{ __("Without a way to unsubscribe, there's a high chance that your subscribers will complain.") }}
                                {!! __('Consider adding the <code>::unsubscribeUrl::</code> placeholder.') !!}
                            </p>
                        @endif
                        @if ($campaign->sizeInKb() >= 102)
                            <p class="markup-code">
                                {{ __("Your email's content size is larger than 102kb (:size). This could cause Gmail to clip your campaign.", ['size' => "{$campaign->sizeInKb()}kb"]) }}
                            </p>
                        @endif
                    @endif
                @else
                    @if(empty($campaign->html))
                        {{ __('Content is missing') }}
                    @else
                        {{ __('HTML is invalid') }}
                    @endif
                @endif

                @if($campaign->html && $campaign->hasValidHtml())
                    <div class="buttons gap-4">
                        <x-mailcoach::button-secondary data-modal-trigger="preview" :label="__('Preview')"/>
                        <x-mailcoach::button-secondary data-modal-trigger="send-test" :label="__('Send Test')"/>
                    </div>

                    <x-mailcoach::modal :title="__('Preview') . ' - ' . $campaign->subject" name="preview" large>
                        <iframe class="absolute" width="100%" height="100%"
                                src="data:text/html;base64,{{ base64_encode($campaign->html) }}"></iframe>
                    </x-mailcoach::modal>

                    <x-mailcoach::modal :title="__('Send Test')" name="send-test">
                        @include('mailcoach::app.campaigns.partials.test')
                    </x-mailcoach::modal>
                @endif
            </dd>

            <dt>
                <span class="inline-flex items-center">
                    <x-mailcoach::rounded-icon :type="count($links) ? 'info' : 'neutral'" icon="fas fa-link"
                                               class="mr-2"/>
                    <span class="ml-2">
                        {{ __('Links') }}
                    </span>
                </span>
            </dt>

            <dd>
                @if (count($links))
                    <p class="markup-code">
                        {{ __("The following links were found in your campaign, make sure they are valid.") }}
                    </p>
                    <ul class="grid gap-2">
                        @foreach ($links as $url)
                            <li>
                                <a target="_blank" class="link" href="{{ $url }}">{{ $url }}</a><br>
                                <span class="mb-2 tag-neutral">{{ \Spatie\Mailcoach\Domain\Shared\Support\LinkHasher::hash($campaign, $url) }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="markup-code">
                        {{ __("No links were found in your campaign.") }}
                    </p>
                @endif
            </dd>

            <dt>
                <span class="inline-flex items-center">
                    <x-mailcoach::rounded-icon type="neutral" icon="fas fa-tag" class="mr-2"/>
                    <span class="ml-2">
                        {{ __('Tags') }}
                    </span>
                </span>
            </dt>

            <dd>
                <p class="markup-code">
                    {{ __("The following tags will be added to subscribers when they open or click the campaign:") }}
                </p>
                <ul class="flex space-x-2">
                    <li class="tag">{{ "campaign-{$campaign->id}-opened" }}</li>
                    <li class="tag">{{ "campaign-{$campaign->id}-clicked" }}</li>
                </ul>
            </dd>

            @if ($campaign->isReady())
                <dt>
                    <span class="inline-flex items-center">
                        <x-mailcoach::rounded-icon :type="$campaign->scheduled_at ? 'warning' : 'neutral'"
                                                   icon="far fa-clock" class="mr-2"/>
                        <span class="ml-2">
                            {{ __('Timing') }}
                        </span>
                    </span>
                </dt>

                <dd>
                    @if($campaign->scheduled_at)
                        <form method="POST" action="{{ route('mailcoach.campaigns.unschedule', $campaign) }}">
                            @csrf
                            <p class="mb-3">
                                {{ __('This campaign is scheduled to be sent at') }}

                                <strong>{{ $campaign->scheduled_at->toMailcoachFormat() }}</strong>.
                            </p>
                            <button type="submit" class="button-secondary">
                                {{ __('Unschedule') }}
                            </button>
                        </form>
                    @elseif ($campaign->isEditable())
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
                            <div class="flex items-end">
                                <x-mailcoach::date-time-field :name="'scheduled_at'"
                                                              :value="optional($campaign->scheduled_at)->setTimezone(config('app.timezone'))"
                                                              required/>

                                <button type="submit" class="ml-6 button">
                                    {{ __('Schedule delivery') }}
                                </button>
                            </div>
                            <p class="mt-2 text-xs text-gray-400">
                                {{ __('All times in :timezone', ['timezone' => config('app.timezone')]) }}
                            </p>
                        </form>
                    @elseif (! $campaign->sent_to_number_of_subscribers)
                        <div class="flex alert alert-info">
                            <div class="mr-2">
                                <i class="far fa-sync fa-spin text-blue-500"></i>
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
                        <div class="flex alert alert-info">
                            <div class="mr-2">
                                <i class="far fa-ban text-red-500"></i>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p>
                                    <span class="inline-block">{{ __('Campaign') }}</span>
                                    <a class="inline-block" target="_blank"
                                       href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

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
                        <div class="flex alert alert-info">
                            <div class="mr-2">
                                <i class="far fa-sync fa-spin text-blue-500"></i>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p>
                                    <span class="inline-block">{{ __('Campaign') }}</span>
                                    <a class="inline-block" target="_blank"
                                       href="{{ $campaign->webviewUrl() }}">{{ $campaign->name }}</a>

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
                                    <x-mailcoach::form-button class="text-red-500 underline"
                                                              action="{{ route('mailcoach.campaigns.cancel-sending', $campaign) }}"
                                                              dataConfirm
                                                              dataConfirmText="{{ __('Are you sure you want to cancel sending this campaign?') }}">
                                        Cancel
                                    </x-mailcoach::form-button>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($campaign->isEditable())
                        <div
                            class="buttons | {{ ($campaign->scheduled_at || $errors->first('scheduled_at')) ? 'hidden' : '' }}"
                            data-conditional-schedule="now"
                        >
                            <x-mailcoach::button data-modal-trigger="send-campaign" :label="__('Send now')"/>
                        </div>
                        <x-mailcoach::modal name="send-campaign">

                            <div class="grid gap-8 p-6">
                                <p class="text-lg">

                                    {{ __('Are you sure you want to send this campaign to') }}
                                    <strong class="font-semibold">
                                        {{ number_format($campaign->segmentSubscriberCount()) }}
                                        {{ $campaign->segmentSubscriberCount() === 1 ? __('subscriber') : __('subscribers') }}
                                    </strong>?
                                </p>

                                <x-mailcoach::form-button
                                    :action="route('mailcoach.campaigns.send', $campaign)"
                                    class="button button-red"
                                >
                                    {{ __('Yes, send now!')}}
                                </x-mailcoach::form-button>
                            </div>
                        </x-mailcoach::modal>
                    @endif
                </dd>
            @endif
        </dl>
    </div>
</x-mailcoach::layout-campaign>
