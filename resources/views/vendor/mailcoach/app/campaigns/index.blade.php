@extends('mailcoach::app.layouts.app', ['title' => __('Campaigns')])

@section('header')
<nav>
    <ul class="breadcrumbs">
        <li>
            <span class="breadcrumb">{{ __('Campaigns') }}</span>
        </li>
    </ul>
</nav>
@endsection

@section('content')
<section class="card">
    <div class="table-actions">
        @if ($totalListsCount or $totalCampaignsCount)
            <button class="button" data-modal-trigger="create-campaign">
                <x-mailcoach::icon-label icon="fa-envelope-open" :text="__('Create campaign')" />
            </button>

            <x-mailcoach::modal :title="__('Create campaign')" name="create-campaign" :open="$errors->any()">
                @include('mailcoach::app.campaigns.partials.create')
            </x-mailcoach::modal>
        @endif

        @if($totalCampaignsCount)
            <div class="table-filters">
                <x-mailcoach::filters>
                    <x-mailcoach::filter active-on="" :queryString="$queryString" attribute="status">
                        {{ __('All') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($totalCampaignsCount) }}</span>
                    </x-mailcoach::filter>
                    <x-mailcoach::filter active-on="sent" :queryString="$queryString" attribute="status">
                        {{ __('Sent') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($sentCampaignsCount) }}</span>
                    </x-mailcoach::filter>
                    <x-mailcoach::filter active-on="scheduled" :queryString="$queryString" attribute="status">
                        {{ __('Scheduled') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($scheduledCampaignsCount) }}</span>
                    </x-mailcoach::filter>
                    <x-mailcoach::filter active-on="draft" :queryString="$queryString" attribute="status">
                        {{ __('Draft') }} <span class="counter">{{ Illuminate\Support\Str::shortNumber($draftCampaignsCount) }}</span>
                    </x-mailcoach::filter>
                </x-mailcoach::filters>
                <x-mailcoach::search :placeholder="__('Filter campaigns…')"/>
            </div>
        @endif
    </div>

    @if($totalCampaignsCount)
        <table class="table table-fixed">
            <thead>
                <tr>
                    <x-mailcoach::th class="w-4"></x-mailcoach::th>
                    <x-mailcoach::th sort-by="name">{{ __('Name') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="email_list_id" class="w-48">{{ __('List') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-sent_to_number_of_subscribers" class="w-24 th-numeric">{{ __('Emails') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-unique_open_count" class="w-24 th-numeric hidden | md:table-cell">{{ __('Opens') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-unique_click_count" class="w-24 th-numeric hidden | md:table-cell">{{ __('Clicks') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-sent" sort-default class="w-48 th-numeric hidden | md:table-cell">{{ __('Sent') }}</x-mailcoach::th>
                    <x-mailcoach::th class="w-12"></x-mailcoach::th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $campaign)
                @include('mailcoach::app.campaigns.partials.row')
                @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status :name="__('campaign|campaigns')" :paginator="$campaigns" :total-count="$totalCampaignsCount"
        :show-all-url="route('mailcoach.campaigns')"></x-mailcoach::table-status>
    @else
        @if ($totalListsCount)
            <p class="alert alert-info">
                {{ __('No campaigns yet. Go write something!') }}
            </p>
        @else
            <p class="alert alert-info">
                {!! __('No campaigns yet, but you‘ll need a list first, go <a href=":emailListsLink">create one</a>!', ['emailListsLink' => route('mailcoach.emailLists')]) !!}
            </p>
        @endif
    @endif
</section>
@endsection
