<x-mailcoach::layout
    :originTitle="$originTitle ?? $template->name"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation :title="$template->name" :backHref="route('mailcoach.transactionalMails.templates')"
                                :backLabel="__('Templates')">
            <x-mailcoach::navigation-group>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMails.templates.edit', $template)"
                                            data-dirty-warn>
                    {{ __('Content') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMails.templates.settings', $template)"
                                            data-dirty-warn>
                    {{ __('Settings') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>
        </x-mailcoach::navigation>
    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
