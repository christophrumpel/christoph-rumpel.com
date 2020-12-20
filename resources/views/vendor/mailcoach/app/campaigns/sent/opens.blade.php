@extends('mailcoach::app.campaigns.sent.layouts.show', [
    'campaign' => $campaign,
    'titlePrefix' => __('Opens'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.campaigns.summary', $campaign) }}">
            <span class="breadcrumb">{{ $campaign->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Opens') }}</span></li>
@endsection

@section('campaign')
    @if($campaign->track_opens)
        @if($campaign->open_count)
            <div class="table-actions">
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter opens…')" />
                </div>
            </div>

            <table class="table table-fixed">
                <thead>
                    <tr>
                        <x-mailcoach::th sort-by="email">{{ __('Email') }}</x-mailcoach::th>
                        <x-mailcoach::th sort-by="open_count" class="w-32 th-numeric">{{ __('Opens') }}</x-mailcoach::th>
                        <x-mailcoach::th sort-by="-first_opened_at" sort-default class="w-48 th-numeric hidden | md:table-cell">{{ __('First opened at') }}</x-mailcoach::th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaignOpens as $campaignOpen)
                        <tr>
                            <td class="markup-links">
                                <a class="break-words" href="{{ route('mailcoach.emailLists.subscriber.details', [$campaign->emailList, $campaignOpen->subscriber_id]) }}">
                                    {{ $campaignOpen->subscriber_email }}
                                </a>
                            </td>
                            <td class="td-numeric">{{ $campaignOpen->open_count }}</td>
                            <td class="td-numeric hidden | md:table-cell">{{ $campaignOpen->first_opened_at->toMailcoachFormat() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <x-mailcoach::table-status
                :name="__('open|opens')"
                :paginator="$campaignOpens"
                :total-count="$totalCampaignOpensCount"
                :show-all-url="route('mailcoach.campaigns.opens', $campaign)"
            ></x-mailcoach::table-status>
        @else
            <p class="alert alert-info">
                {{ __('No opens yet. Stay tuned.') }}
            </p>
        @endif
    @else
        <p class="alert alert-info">
            {{ __('Open tracking was not enabled for this campaign.') }}
        </p>
    @endif
@endsection
