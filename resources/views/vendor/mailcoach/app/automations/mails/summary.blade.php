<x-mailcoach::layout-automation-mail :title="__('Performance')" :mail="$mail">
    <div>
        <div class="grid grid-cols-auto-1fr gap-2 alert alert-success">
            <div>
                <i class="fas fa-check text-green-500"></i>
            </div>
            <div>
                {{ __('AutomationMail') }}
                <strong>{{ $mail->name }}</strong>
                {{ __('was delivered to') }}
                <strong>{{ number_format($mail->sent_to_number_of_subscribers - ($failedSendsCount ?? 0)) }} {{ trans_choice('subscriber|subscribers', $mail->sent_to_number_of_subscribers) }}</strong>
            </div>

            @if($failedSendsCount)
                <div>
                    <i class="fas fa-times text-red-500"></i>
                </div>
                <div>
                    {{ __('Delivery failed for') }}
                    <strong>{{ $failedSendsCount }}</strong> {{ trans_choice('subscriber|subscribers', $failedSendsCount) }}
                    .
                    <a class="underline"
                       href="{{ route('mailcoach.automations.mails.outbox', $mail) . '?filter[type]=failed' }}">{{ __('Check the outbox') }}</a>.
                </div>
            @endif

            <div class="col-start-2 text-sm text-green-600">{{ $mail->created_at->toMailcoachFormat() }}</div>
        </div>

        @include('mailcoach::app.automations.mails.partials.statistics')
    </div>
</x-mailcoach::layout-automation-mail>
