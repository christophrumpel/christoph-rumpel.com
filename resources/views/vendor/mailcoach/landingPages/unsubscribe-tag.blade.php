@extends('mailcoach::landingPages.layouts.landingPage', ['title' => __('Unsubscribed')])

@section('landing')
    <p class="mt-4">
        {!! __('Are you sure you want to unsubscribe from list <strong class="font-semibold">:emailListName</strong>\'s tag :tag?', ['emailListName' => $subscriber->emailList->name, 'tag' => $tag]) !!}
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
