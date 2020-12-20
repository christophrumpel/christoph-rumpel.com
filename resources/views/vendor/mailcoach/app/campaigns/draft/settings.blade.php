@extends('mailcoach::app.campaigns.draft.layouts.edit', ['campaign' => $campaign])

@section('breadcrumbs')
    <li><span class="breadcrumb">{{ $campaign->name }}</span></li>
@endsection

@section('campaign')
    <form
        class="form-grid"
        action="{{ route('mailcoach.campaigns.settings', $campaign) }}"
        method="POST"
        data-dirty-check
    >
        @csrf
        @method('PUT')

        <x-mailcoach::text-field :label="__('Name')" name="name" :value="$campaign->name" required />

        <x-mailcoach::text-field :label="__('Subject')" name="subject" :value="$campaign->subject" />

        @include('mailcoach::app.campaigns.draft.partials.emailListFields')

        <div class="form-row">
            <label class="label">{{ __('Track when…') }}</label>
            <div class="checkbox-group">
                <x-mailcoach::checkbox-field :label="__('Someone opens this email')" name="track_opens" :checked="$campaign->track_opens" />
                <x-mailcoach::checkbox-field :label="__('Links in the email are clicked')" name="track_clicks" :checked="$campaign->track_clicks" />
            </div>
        </div>

        <div class="form-buttons">
            <button type="submit" class="button">
                <x-mailcoach::icon-label icon="fa-cog" :text="__('Save settings')" />
            </button>
        </div>
    </form>
@endsection
