<x-mailcoach::layout
    :originTitle="$originTitle ?? null"
    :originHref="$originHref ?? null"
    :title="$title ?? null"
>
    <x-slot name="nav">
        <x-mailcoach::navigation>

            @include('mailcoach::app.layouts.partials.beforeFirstMenuItem')

            <x-mailcoach::navigation-group class="lg:hidden">
                <x-mailcoach::navigation-item :href="route('mailcoach.home')">
                        {{ __('Dashboard') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>

            <x-mailcoach::navigation-group class="lg:hidden sm:col-span-3">
                @include('mailcoach::app.layouts.partials.headerRight')
            </x-mailcoach::navigation-group>

            @can("viewAny", \Spatie\Mailcoach\Domain\Campaign\Models\Campaign::class)
            <x-mailcoach::navigation-group icon="far fa-envelope-open" :title="__('Newsletter')">
                <x-mailcoach::navigation-item :href="route('mailcoach.campaigns')">
                    {{ __('Campaigns') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.templates')">
                    {{ __('Templates') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>
            @endcan

            <x-mailcoach::navigation-group icon="fas fa-magic" :title="__('Drip')">
                <x-mailcoach::navigation-item :href="route('mailcoach.automations')">
                    {{ __('Automations') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.automations.mails')">
                    {{ __('Emails') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>

            @can("viewAny", \Spatie\Mailcoach\Domain\Audience\Models\EmailList::class)
            <x-mailcoach::navigation-group icon="far fa-address-book" :title="__('Audience')">
                <x-mailcoach::navigation-item :href="route('mailcoach.emailLists')">
                    {{ __('Lists') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>
            @endcan

            <x-mailcoach::navigation-group icon="far fa-envelope-open" :title="__('Transactional')">
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMails')">
                    {{ __('Log') }}
                </x-mailcoach::navigation-item>
                <x-mailcoach::navigation-item :href="route('mailcoach.transactionalMails.templates')">
                    {{ __('Templates') }}
                </x-mailcoach::navigation-item>
            </x-mailcoach::navigation-group>

            @include('mailcoach::app.layouts.partials.afterLastMenuItem')

            <x-mailcoach::navigation-group class="hidden lg:block">
                @include('mailcoach::app.layouts.partials.headerRight')
            </x-mailcoach::navigation-group>
        </x-mailcoach::navigation>

    </x-slot>

    {{ $slot }}
</x-mailcoach::layout>
