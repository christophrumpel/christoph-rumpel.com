<x-mailcoach::layout
    :originTitle="$originTitle ?? $automation->name"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation :title="$automation->name" :backHref="route('mailcoach.automations')" :backLabel="__('Automations')">
            <x-mailcoach::navigation-group icon="fas fa-magic" :title="__('Automation')">
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.settings', $automation)" data-dirty-warn>
                    {{ __('Settings') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.actions', $automation)" data-dirty-warn>
                    {{ __('Actions') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.run', $automation)" data-dirty-warn>
                    <span class="flex items-center lg:flex-row-reverse">
                        {{ __('Run')}}
                        <span class="mx-2">
                            @if($automation->status === \Spatie\Mailcoach\Domain\Automation\Enums\AutomationStatus::STARTED)
                                <span class="fas fa-sync fa-spin text-green-500"></span>
                            @endif
                        </span>
                    </span>
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>

        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
