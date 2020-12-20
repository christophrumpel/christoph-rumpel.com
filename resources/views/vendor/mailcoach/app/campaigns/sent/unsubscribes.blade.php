@extends('mailcoach::app.campaigns.sent.layouts.show', [
    'campaign' => $campaign,
    'titlePrefix' => __('Unsubscribes'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.campaigns.summary', $campaign) }}">
            <span class="breadcrumb">{{ $campaign->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Unsubscribes') }}</span></li>
@endsection

@section('campaign')
    @if($unsubscribes->count())
    <div class="table-actions">
        <div class="table-filters">
            <x-mailcoach::search :placeholder="__('Filter unsubscribes…')" />
        </div>
    </div>

    <table class="table table-fixed">
        <thead>
        <tr>
            <th>{{ __('Email') }}</th>
            <th class="w-48 th-numeric hidden | md:table-cell">{{ __('Date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unsubscribes as $unsubscribe)
            <tr>
                <td class="markup-links">
                    <a class="break-words" href="{{ route('mailcoach.emailLists.subscriber.details', [$unsubscribe->subscriber->emailList, $unsubscribe->subscriber]) }}">
                        {{ $unsubscribe->subscriber->email }}
                    </a>
                    <div class="td-secondary-line">
                        {{ $unsubscribe->subscriber->first_name }} {{ $unsubscribe->subscriber->last_name }}
                    </div>
                </td>
                <td class="td-numeric hidden | md:table-cell">{{ $unsubscribe->created_at->toMailcoachFormat() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <x-mailcoach::table-status
        :name="__('unsubscribe|unsubscribers')"
        :paginator="$unsubscribes"
        :total-count="$totalUnsubscribes"
        :show-all-url="route('mailcoach.campaigns.unsubscribes', $campaign)"
    ></x-mailcoach::table-status>

    @else
        <p class="alert alert-success">
            <i class="fas fa-sun text-orange-500 mr-2"></i>
            {{ __('No unsubscribes have been received yet.') }}
        </p>
    @endif
@endsection
