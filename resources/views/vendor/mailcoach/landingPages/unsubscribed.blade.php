@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Unsubscribed')])

@section('landing')
    <p>
        {{ __('Sorry to see you go.') }}
    </p>
    <p class="mt-4">
        {!! __('You have been unsubscribed from list <strong class="font-semibold">:emailListName</strong>.', ['emailListName' => $subscriber->emailList->name]) !!}
    </p>
@endsection
