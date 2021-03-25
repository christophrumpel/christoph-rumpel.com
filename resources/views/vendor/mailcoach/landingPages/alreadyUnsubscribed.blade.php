@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Already unsubscribed')])

@section('landing')
    <p>
        {!! __('You were already unsubscribed from the list <strong class="font-semibold">:emailListName</strong>.', ['emailListName' => $emailList->name]) !!}
    </p>
@endsection
