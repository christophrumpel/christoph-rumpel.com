@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Already subscribed')])

@section('content')
    <p>
        {{ __('You are a real fan!') }}
    </p>
    <p class="mt-4">
        {{ __('You were already subscribed to this list.') }}
    </p>
@endsection
