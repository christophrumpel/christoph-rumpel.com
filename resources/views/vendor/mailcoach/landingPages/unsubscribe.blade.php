@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Unsubscribed')])

@section('content')
    <p class="mt-4">
        {!! __('Are you sure you want to unsubscribe from list <strong class="font-semibold">:emailListName</strong>?', ['emailListName' => $subscriber->emailList->name]) !!}
    </p>

    <div class="mt-4">
        <form method="POST">
            @csrf
            <button class="button bg-red-400 shadow" id="confirmationButton" type="submit">{{__('Unsubscribe') }}</button>
        </form>
    </div>

    <script>
        document.getElementById("confirmationButton").click();
    </script>
@endsection
