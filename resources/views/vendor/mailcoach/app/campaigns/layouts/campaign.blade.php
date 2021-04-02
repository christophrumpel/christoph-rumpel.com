<x-mailcoach::layout
    :originTitle="$originTitle ?? $campaign->name"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation :title="$campaign->name" :backHref="route('mailcoach.campaigns')" :backLabel="__('Campaigns')">
            @if ($campaign->isSendingOrSent())
            <x-mailcoach::navigation-group icon="fas fa-chart-line" :title="__('Performance')">
                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.summary', $campaign)" data-dirty-warn>
                        {{ __('Summary') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.opens', $campaign)" data-dirty-warn>
                        {{ __('Opens') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.clicks', $campaign)" data-dirty-warn>
                        {{ __('Clicks') }}
                    </x-mailcoach::navigation-item>
                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.unsubscribes', $campaign)" data-dirty-warn>
                        {{ __('Unsubscribes') }}
                    </x-mailcoach::navigation-item>

                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.outbox', $campaign)" data-dirty-warn>
                        {{ __('Outbox') }}
                    </x-mailcoach::navigation-item>

            </x-mailcoach::navigation-group>
            @endif

            <x-mailcoach::navigation-group icon="far fa-envelope-open" :title="__('Campaign')">
                <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.settings', $campaign)" data-dirty-warn>
                    {{ __('Settings') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.content', $campaign)" data-dirty-warn>
                    {{ __('Content') }}
                </x-mailcoach::navigation-item>

                @if (! $campaign->isSendingOrSent())
                    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.delivery', $campaign)" data-dirty-warn>
                        {{ __('Send') }}
                    </x-mailcoach::navigation-item>
                @endif
            </x-mailcoach::navigation-group>

        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
