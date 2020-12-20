@extends('mailcoach::app.layouts.app', [
    'title' => (isset($titlePrefix) ?  $titlePrefix . ' | ' : '') . $segment->name
])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <a href="{{ route('mailcoach.emailLists') }}">
                    <span class="breadcrumb">{{ __('Lists') }}</span>
                </a>
            </li>
            <li><a href="{{ route('mailcoach.emailLists.subscribers', $segment->emailList) }}"><span class="breadcrumb">{{ $segment->emailList->name }}</span></a></li>
            <li><a href="{{ route('mailcoach.emailLists.segments', $segment->emailList) }}"><span class="breadcrumb">{{ __('Segments') }}</span></a></li>
            @yield('breadcrumbs')
        </ul>
    </nav>
@endsection

@section('content')
    <nav class="tabs">
        <ul>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.segment.edit', [$segment->emailList, $segment])">
                <x-mailcoach::icon-label icon="fa-chart-pie" :text="__('Segment details')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.segment.subscribers', [$segment->emailList, $segment])">
                <x-mailcoach::icon-label icon="fa-user" :text="__('Population')" :count="$selectedSubscribersCount" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>

    <section class="card">
        @yield('segment')
    </section>
@endsection
