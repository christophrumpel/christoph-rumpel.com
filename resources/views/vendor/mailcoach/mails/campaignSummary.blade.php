@component('mailcoach::mails.layout.message')
{{ __('Hi') }},

{{ __('Campaign **:campaignName** was sent to **:numberOfSubscribers** subscribers (list :emailListName) on :sentAt', ['campaignName'=>$campaign->name,'numberOfSubscribers'=>($campaign->sent_to_number_of_subscribers ?? 0 ),'emailListName'=>$campaign->emailList->name,'sentAt'=>$campaign->sent_at->toMailcoachFormat()]) }}.


<table class="stats">
<tr>
@if ($campaign->track_opens)
<td>
@include('mailcoach::mails.partials.statistic', [
'href' => route('mailcoach.campaigns.opens', $campaign),
'stat' => $campaign->open_count,
'label' => __('Opens'),
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => $campaign->unique_open_count,
'label' => __('Unique Opens'),
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => number_format(($campaign->open_rate / 100), 2),
'suffix' => '%',
'label' => __('Open Rate'),
])
</td>
@else
<td colspan=3>
<div class="text-4xl font-semibold">–</div>
<div class="text-sm">{{ __('Opens not tracked') }}</div>
</td>
@endif
</tr>

<tr>
@if($campaign->track_clicks)
<td>
@include('mailcoach::mails.partials.statistic', [
'href' => route('mailcoach.campaigns.clicks', $campaign),
'stat' => $campaign->click_count,
'label' => __('Clicks'),
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => $campaign->unique_click_count,
'label' => __('Unique Clicks'),
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => number_format(($campaign->click_rate / 100), 2),
'suffix' => '%',
'label' => __('Clicks Rate'),
])
</td>
@else
<td colspan=3>
<div class="text-4xl font-semibold">–</div>
<div class="text-sm">{{ __('Clicks not tracked') }}</div>
</td>
@endif
</tr>

<tr>
<td>
@include('mailcoach::mails.partials.statistic', [
'href' => route('mailcoach.campaigns.unsubscribes', $campaign),
'stat' => $campaign->unsubscribe_count,
'label' => __('Unsubscribes'),
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => number_format(($campaign->unsubscribe_rate / 100), 2),
'label' => __('Unsubscribe Rate'),
'suffix' => '%'
])
</td>
<td></td>
</tr>

<tr>
<td>
@include('mailcoach::mails.partials.statistic', [
'href' => route('mailcoach.campaigns.outbox', $campaign),
'stat' => $campaign->bounce_count,
'label' => 'Bounces',
])
</td>
<td>
@include('mailcoach::mails.partials.statistic', [
'stat' => number_format(($campaign->bounce_rate / 100), 2),
'label' => 'Bounce Rate',
'suffix' => '%'
])
</td>
<td></td>
</tr>
</table>

@component('mailcoach::mails.layout.button', ['url' => $summaryUrl])
	{{ __('View summary') }}
@endcomponent

@endcomponent
