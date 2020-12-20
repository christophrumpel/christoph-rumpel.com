@extends('mailcoach::app.emailLists.layouts.subscriber', [
    'subscriber' => $subscriber,
    'titlePrefix' => __('Received campaigns'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.emailLists.subscriber.details', [$subscriber->emailList, $subscriber]) }}">
            <span class="breadcrumb">{{ $subscriber->email }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Received campaigns') }}</span></li>
@endsection

@section('subscriber')
    @if($sends->count())
        <div class="table-actions">
            <div class="table-filters">
                <x-mailcoach::search :placeholder="__('Filter campaigns…')"/>
            </div>
        </div>

        <table class="table table-fixed">
            <thead>
                <tr>
                    <th>{{ __('Campaign') }}</th>
                    <th class="w-32 th-numeric">{{ __('Opens') }}</th>
                    <th class="w-32 th-numeric">{{ __('Clicks') }}</th>
                    <th class="w-48 th-numeric hidden | md:table-cell">{{ __('Sent') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sends as $send)
                    <tr>
                        <td class="markup-links">
                            <a class="break-words" href="{{ route('mailcoach.campaigns.summary', $send->campaign) }}">
                                {{ $send->campaign->name }}
                            </a>
                        </td>
                        <td class="td-numeric">{{ $send->opens()->count() }}</td>
                        <td class="td-numeric">{{ $send->clicks()->count() }}</td>
                        <td class="td-numeric hidden | md:table-cell">{{ $send->sent_at->toMailcoachFormat() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status
            :name="__('send|sends')"
            :paginator="$sends"
            :total-count="$totalSendsCount"
            :show-all-url="route('mailcoach.emailLists.subscribers', [$subscriber->emailList])"
        ></x-mailcoach::table-status>
    @else
        <p class="alert alert-info">
            {{ __("This user hasn't received any campaign yet.") }}
        </p>
    @endif
@endsection
