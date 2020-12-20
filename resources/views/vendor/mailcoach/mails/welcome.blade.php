@component('mail::message')
{{ __('Hi') }},

{{ __('You are now subscribed to list :emailListName', ['emailListName'=>$subscriber->emailList->name]) }}.

{{ __('Happy to have you!') }}!

@slot('subcopy')
    {!! __('If you accidentally subscribed to this list, click here to <a href=":unsubscribelink">unsubscribe</a>',['unsubscribelink'=>$subscriber->unsubscribeUrl()]) !!}
@endslot

@endcomponent
