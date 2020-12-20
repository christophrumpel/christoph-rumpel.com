@extends('mailcoach::app.layouts.app', [
    'title' => (isset($titlePrefix) ?  $titlePrefix . ' | ' : '') . $subscriber->email
])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <a href="{{ route('mailcoach.emailLists') }}">
                    <span class="breadcrumb">{{ __('Lists') }}</span>
                </a>
            </li>
            <li><a href="{{ route('mailcoach.emailLists.subscribers', $subscriber->emailList) }}"><span class="breadcrumb">{{ $subscriber->emailList->name }}</span></a></li>
            @yield('breadcrumbs')
        </ul>
    </nav>
@endsection

@section('content')
    <nav class="tabs">
        <ul>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.subscriber.details', [$subscriber->emailList, $subscriber])">
                <x-mailcoach::icon-label icon="fa-user" :text="__('Subscriber details')" />
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.subscriber.receivedCampaigns', [$subscriber->emailList, $subscriber])">
                <x-mailcoach::icon-label icon="fa-envelope-open" :text="__('Received campaigns')" :count="$totalSendsCount" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>

    <section class="card">
        @yield('subscriber')
    </section>
@endsection
