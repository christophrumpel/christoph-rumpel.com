<x-mailcoach::layout-automation-mail :title="__('Delivery')" :mail="$mail">
    <div>
        <div class="grid gap-2">
            @if($mail->isReady())
                @if (! $mail->htmlContainsUnsubscribeUrlPlaceHolder() || $mail->sizeInKb() > 102)
                    <x-mailcoach::warning>
                        {!! __('Automation mail <strong>:mail</strong> can be sent, but you might want to check your content.', ['mail' => $mail->name]) !!}
                    </x-mailcoach::warning>
                @else
                    <x-mailcoach::success>
                        {!! __('Automation mail <strong>:mail</strong> is ready to be sent.', ['mail' => $mail->name]) !!}
                    </x-mailcoach::success>
                @endif
            @else
                <x-mailcoach::error>
                    {{ __('You need to check some settings before you can deliver this mail.') }}
                </x-mailcoach::error>
            @endif
        </div>

        <dl class="mt-8 dl">
            <dt>
                <x-mailcoach::health-label :test="$mail->subject" :label="__('Subject')"/>
            </dt>

            <dd>
                {{ $mail->subject ?? __('Subject is empty') }}
            </dd>

            <dt>
                @if($mail->html && $mail->hasValidHtml())
                    <x-mailcoach::health-label
                        :test="$mail->htmlContainsUnsubscribeUrlPlaceHolder() && $mail->sizeInKb() < 102"
                        warning="true"
                        :label="__('Content')"/>
                @else
                    <x-mailcoach::health-label :test="false" :label="__('Content')"/>
                @endif
            </dt>

            <dd class="grid gap-4">
                @if($mail->html && $mail->hasValidHtml())
                    @if ($mail->htmlContainsUnsubscribeUrlPlaceHolder() && $mail->sizeInKb() < 102)
                        <p class="markup-code">
                            {{ __('Content seems fine.') }}
                        </p>
                    @else
                        @if (! $mail->htmlContainsUnsubscribeUrlPlaceHolder())
                            <p class="markup-code">
                                {{ __("Without a way to unsubscribe, there's a high chance that your subscribers will complain.") }}
                                {!! __('Consider adding the <code>::unsubscribeUrl::</code> placeholder.') !!}
                            </p>
                        @endif
                        @if ($mail->sizeInKb() >= 102)
                            <p class="markup-code">
                                {{ __("Your email's content size is larger than 102kb (:size). This could cause Gmail to clip your mail.", ['size' => "{$mail->sizeInKb()}kb"]) }}
                            </p>
                        @endif
                    @endif
                @else
                    @if(empty($mail->html))
                        {{ __('Content is missing') }}
                    @else
                        {{ __('HTML is invalid') }}
                    @endif
                @endif

                @if($mail->html && $mail->hasValidHtml())
                    <div class="buttons gap-4">
                        <x-mailcoach::button-secondary data-modal-trigger="preview" :label="__('Preview')"/>
                        <x-mailcoach::button-secondary data-modal-trigger="send-test" :label="__('Send Test')"/>
                    </div>

                    <x-mailcoach::modal :title="__('Preview') . ' - ' . $mail->subject" name="preview" large>
                        <iframe class="absolute" width="100%" height="100%"
                                src="data:text/html;base64,{{ base64_encode($mail->html) }}"></iframe>
                    </x-mailcoach::modal>

                    <x-mailcoach::modal :title="__('Send Test')" name="send-test">
                        @include('mailcoach::app.automations.mails.partials.test')
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
                        {{ __("The following links were found in your mail, make sure they are valid.") }}
                    </p>
                    <ul class="grid gap-2">
                        @foreach ($links as $url)
                            <li>
                                <a target="_blank" class="link" href="{{ $url }}">{{ $url }}</a><br>
                                <span class="mb-2 tag-neutral">{{ \Spatie\Mailcoach\Domain\Shared\Support\LinkHasher::hash($mail, $url) }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="markup-code">
                        {{ __("No links were found in your mail.") }}
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
                    {{ __("The following tags will be added to subscribers when they open or click the mail:") }}
                </p>
                <ul class="flex space-x-2">
                    <li class="tag">{{ "automation-mail-{$mail->id}-opened" }}</li>
                    <li class="tag">{{ "automation-mail-{$mail->id}-clicked" }}</li>
                </ul>
            </dd>

            @if ($mail->isReady() && $mail->sendsCount() > 0)
                <div class="flex alert alert-info mt-6">
                    <div class="mr-2">
                        <i class="far fa-sync fa-spin text-blue-500"></i>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p>
                            <span class="inline-block">{{ __('Automation mail') }}</span>
                            <a class="inline-block" target="_blank"
                               href="{{ $mail->webviewUrl() }}">{{ $mail->name }}</a>

                            {{ __('has been sent to :sendsCount :subscriber', [
                                'sendsCount' => $mail->sendsCount(),
                                'subscriber' => trans_choice(__('subscriber|subscribers'), $mail->sendsCount())
                            ]) }}
                        </p>

                        @if ($mail->send_batch_id)
                            <x-mailcoach::form-button class="text-red-500 underline"
                                                      action="{{ route('mailcoach.mails.cancel-sending', $mail) }}"
                                                      dataConfirm
                                                      dataConfirmText="{{ __('Are you sure you want to cancel sending this mail?') }}">
                                Cancel
                            </x-mailcoach::form-button>
                        @endif
                    </div>
                </div>
            @endif
        </dl>
    </div>
</x-mailcoach::layout-automation-mail>
