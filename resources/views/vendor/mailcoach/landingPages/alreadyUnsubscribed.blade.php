@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Already unsubscribed')])

@section('content')
    <p>
        {!! __('You were already unsubscribed from the list <strong class="font-semibold">:emailListName</strong>.', ['emailListName' => $emailList->name]) !!}
    </p>
@endsection
