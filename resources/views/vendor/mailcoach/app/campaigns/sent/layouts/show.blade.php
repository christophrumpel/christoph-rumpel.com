@extends('mailcoach::app.layouts.app', [
    'title' => (isset($titlePrefix) ?  $titlePrefix . ' | ' : '') . $campaign->name
])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <a href={{ route('mailcoach.campaigns') }}>
                    <span class="breadcrumb">{{ __('Campaigns') }}</span>
                </a>
            </li>
            @yield('breadcrumbs')
        </ul>
    </nav>
@endsection

@section('content')
    <nav class="tabs">
        <ul>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.summary', $campaign)">
                <x-mailcoach::icon-label icon="fa-chart-area" :text="__('Summary')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.opens', $campaign)">
                <x-mailcoach::icon-label icon="fa-envelope-open-text" :text="__('Opens')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.clicks', $campaign)">
                <x-mailcoach::icon-label icon="fa-hand-pointer" :text="__('Clicks')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.unsubscribes', $campaign)">
                <x-mailcoach::icon-label icon="fa-user-slash" :text="__('Unsubscribes')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.outbox', $campaign)">
                <x-mailcoach::icon-label icon="fa-inbox" :text="__('Outbox')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.used-settings', $campaign)">
                <x-mailcoach::icon-label icon="fa-cog" :text="__('Used settings')" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>

    <section class="card ">
        @yield('campaign')
    </section>
@endsection
