@component('mailcoach::mails.layout.message')
{{ __('Hi') }},

{{ __("Here's what's been happening last week at your list **:emailListName** since :startDate", ['emailListName'=>$emailList->name, 'startDate'=>$summaryStartDateTime->toMailcoachFormat()]) }}.

@component('mailcoach::mails.layout.panel')
- {{ __('New subscriptions') }}: <strong>{{ $summary['total_number_of_subscribers_gained'] }}</strong>
- {{ __('Unsubscribes') }}: <strong>{{ $summary['total_number_of_unsubscribes_gained'] }}</strong>
- {{ __('Total number of subscribers') }}: <strong>{{ $summary['total_number_of_subscribers'] }}</strong>
@endcomponent

@component('mailcoach::mails.layout.button', ['url' => $emailListUrl])
    {{ __('View list') }}
@endcomponent

@endcomponent
