<x-mailcoach::layout
    :originTitle="$originTitle ?? $mail->name"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation :title="$mail->name" :backHref="route('mailcoach.automations.mails')" :backLabel="__('Emails')">
                <x-mailcoach::navigation-group icon="fas fa-chart-line" :title="__('Performance')">
                    <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.summary', $mail)" data-dirty-warn>
                        {{ __('Summary') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.opens', $mail)" data-dirty-warn>
                        {{ __('Opens') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.clicks', $mail)" data-dirty-warn>
                        {{ __('Clicks') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.unsubscribes', $mail)" data-dirty-warn>
                        {{ __('Unsubscribes') }}
                    </x-mailcoach::navigation-item>

                    <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.outbox', $mail)" data-dirty-warn>
                        {{ __('Outbox') }}
                    </x-mailcoach::navigation-item>

                </x-mailcoach::navigation-group>

            <x-mailcoach::navigation-group icon="far fa-envelope-open" :title="__('Email')">
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.settings', $mail)" data-dirty-warn>
                    {{ __('Settings') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.content', $mail)" data-dirty-warn>
                    {{ __('Content') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails.delivery', $mail)" data-dirty-warn>
                    {{ __('Delivery') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>

        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
