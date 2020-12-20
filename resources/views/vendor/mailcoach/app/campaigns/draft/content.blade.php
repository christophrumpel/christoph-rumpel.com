@extends('mailcoach::app.campaigns.draft.layouts.edit', [
    'campaign' => $campaign,
    'titlePrefix' => __('HTML'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.campaigns.settings', $campaign) }}">
            <span class="breadcrumb">{{ $campaign->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Content') }}</span></li>
@endsection

@section('campaign')
    <form
        class="form-grid"
        action="{{ route('mailcoach.campaigns.updateContent', $campaign) }}"
        method="POST"
        data-dirty-check
    >
        @csrf
        @method('PUT')
        {!! app(config('mailcoach.editor'))->render($campaign) !!}
    </form>

    <x-mailcoach::replacer-help-texts />
@endsection
