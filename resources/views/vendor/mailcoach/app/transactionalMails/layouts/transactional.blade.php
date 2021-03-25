<x-mailcoach::layout
    :originTitle="$originTitle ?? $transactionalMail->subject"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>

     <x-slot name="nav">
        <x-mailcoach::navigation :title="$transactionalMail->subject" :backHref="route('mailcoach.transactionalMails')" :backLabel="__('Log')">
            <x-mailcoach::navigation-group>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMail.show', $transactionalMail)">
                    {{ __('Content') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMail.performance', $transactionalMail)">
                    {{ __('Performance') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMail.resend', $transactionalMail)">
                    {{ __('Resend') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>
        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
