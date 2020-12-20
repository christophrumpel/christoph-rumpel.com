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
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.settings', $campaign)" data-dirty-warn>
                <x-mailcoach::icon-label icon="fa-cog" :text="__('Settings')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.content', $campaign)" data-dirty-warn>
                <x-mailcoach::icon-label icon="fa-code" :text="__('Content')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.campaigns.delivery', $campaign)" data-dirty-warn>
                <x-mailcoach::icon-label icon="fa-paper-plane" :text="__('Delivery')" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>
    <section class="card ">

        @yield('campaign')
    </section>
@endsection
