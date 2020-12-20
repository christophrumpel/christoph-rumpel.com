@component('mailcoach::mails.layout.message')
{{ __('Good job!') }}

{{ __('Campaign **:campaignName** was sent to **:numberOfSubscribers** subscribers (list :emailListName)',['campaignName'=>$campaign->name,'numberOfSubscribers'=>($campaign->sent_to_number_of_subscribers ?? 0 ),'emailListName'=>$campaign->emailList->name]) }}.

@component('mailcoach::mails.layout.button', ['url' => $summaryUrl])
    {{ __('View summary') }}
@endcomponent

@endcomponent
