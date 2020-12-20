@extends('mailcoach::app.emailLists.layouts.segment', [
    'segment' => $segment,
    'titlePrefix' => __('Population'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.emailLists.segment.edit', [$segment->emailList, $segment]) }}">
            <span class="breadcrumb">{{ $segment->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Population') }}</span></li>
@endsection

@section('segment')
    @if($selectedSubscribersCount)

        @if($subscribersCount = $segment->emailList->subscribers->count())
            <div class="alert alert-info mb-8">
                {!! __('Population is <strong>:percentage%</strong> of list total of :subscribersCount.', ['percentage' => round($selectedSubscribersCount / $subscribersCount * 100 , 2), 'subscribersCount' => $subscribersCount]) !!}
            </div>
        @endif

        <div class="table-overflow">
            <table class="table table-fixed">
                <thead>
                <tr>
                    <x-mailcoach::th sort-by="email">{{ __('Email') }}</x-mailcoach::th>
                    <th>{{ __('Tags') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $subscriber)
                    <tr class="markup-links">
                        <td>
                            <a class="break-words" href="{{ route('mailcoach.emailLists.subscriber.details', [$subscriber->emailList, $subscriber]) }}">
                                {{ $subscriber->email }}
                            </a>
                            <div class="td-secondary-line">
                                {{ $subscriber->first_name }} {{ $subscriber->last_name }}
                            </div>
                        </td>
                        <td>
                            @foreach($subscriber->tags()->pluck('name') as $tag)
                                <span class=tag>{{ $tag }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <x-mailcoach::table-status :name="__('subscriber|subscribers')" :paginator="$subscribers" :total-count="$selectedSubscribersCount"
                        :show-all-url="route('mailcoach.emailLists.segment.subscribers', [$segment->emailList, $segment])">
        </x-mailcoach::table-status>
    @else
        <p class="alert alert-info">
            {{ __('This is a very exclusive segment. Nobody got selected.') }}
        </p>
    @endif
@endsection
