@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Confirm subscription')])

@section('content')
    <p>
        {{ __('Hey, is that really you?') }}
    </p>
    <p class="mt-4">
        {{ __("We've sent you an email to confirm your subscription.") }}
    </p>
@endsection
