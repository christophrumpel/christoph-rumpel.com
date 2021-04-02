@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Unsubscribed')])

@section('landing')
    <p>
        {{ __('Sorry to see you go.') }}
    </p>
    <p class="mt-4">
        {!! __('You have been unsubscribed from list <strong class="font-semibold">:emailListName</strong>\'s tag :tag.', ['emailListName' => $subscriber->emailList->name, 'tag' => $tag]) !!}
    </p>
@endsection
