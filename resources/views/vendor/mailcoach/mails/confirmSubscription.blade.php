@component('mail::message')
{{ __('Hey') }},

{{ __('You are almost subscribed to the list **:emailListName**.', ['emailListName'=>$subscriber->emailList->name]) }}

{{ __('Prove it is really you by pressing the button below') }}.

@component('mail::button', ['url' => $confirmationUrl])
    {{ __('Confirm subscription') }}
@endcomponent

@endcomponent
