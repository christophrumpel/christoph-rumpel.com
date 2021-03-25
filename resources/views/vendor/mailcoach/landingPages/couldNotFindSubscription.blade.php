@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Could not find subscription')])

@section('landing')
    <p>
        {{ __('We could not find your subscription to this list.') }}
    </p>
    <p class="mt-4">
        {{ __('The link you used seems invalid.') }}
    </p>
@endsection
