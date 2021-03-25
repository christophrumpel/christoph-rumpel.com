@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Subscribed')])

@section('landing')
    <p>
        {{ __('Happy to have you!') }}
    </p>
    <p class="mt-4">
        @isset($subscriber)
            {!! __('You are now subscribed to the list <strong class="font-semibold">:emailListName</strong>.', ['emailListName' => $subscriber->emailList->name]) !!}
        @else
            {!! __('You are now subscribed to the list <strong class="font-semibold">our dummy mailing list</strong>.') !!}
        @endif
    </p>
@endsection

