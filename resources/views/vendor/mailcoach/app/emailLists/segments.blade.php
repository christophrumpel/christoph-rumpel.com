@extends('mailcoach::app.emailLists.layouts.edit', [
    'emailList' => $emailList,
    'titlePrefix' => __('Segments'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.emailLists.subscribers', $emailList) }}">
            <span class="breadcrumb">{{ $emailList->name }}</span>
        </a>
    </li>
    <li><span class="breadcrumb">{{ __('Segments') }}</span></li>
@endsection

@section('emailList')
    <div class="table-actions">
        <div class=buttons>
            <button class="button" data-modal-trigger="create-segment">
                <x-mailcoach::icon-label icon="fa-chart-pie" :text="__('Add segment')"/>
            </button>

            <x-mailcoach::modal :title="__('Create segment')" name="create-segment" :open="$errors->any()">
                @include('mailcoach::app.emailLists.segment.partials.create')
            </x-mailcoach::modal>
        </div>
    </div>

    @if($emailList->segments()->count())
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="name">{{ __('Name') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-created_at" class="w-48 th-numeric hidden | md:table-cell">{{ __('Created at') }}</x-mailcoach::th>
                <th class="w-12"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($segments as $segment)
                <tr class="markup-links">
                    <td>
                        <a class="break-words" href="{{ route('mailcoach.emailLists.segment.edit', [$segment->emailList, $segment]) }}">
                            {{ $segment->name }}
                        </a>
                    </td>
                    <td class="td-numeric hidden | md:table-cell">{{ $segment->created_at->toMailcoachFormat() }}</td>
                    <td class="td-action">
                        <div class="dropdown" data-dropdown>
                            <button class="icon-button" data-dropdown-trigger>
                                <i class="fas fa-ellipsis-v | dropdown-trigger-rotate"></i>
                            </button>
                            <ul class="dropdown-list dropdown-list-left | hidden" data-dropdown-list>
                                <li>
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.emailLists.segment.duplicate', [$segment->emailList, $segment])"
                                    >
                                        <x-mailcoach::icon-label icon="fa-random" :text="__('Duplicate')" />
                                    </x-mailcoach::form-button>
                                </li>
                                <li>
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.emailLists.segment.delete', [$segment->emailList, $segment])"
                                        method="DELETE" data-confirm="true" :data-confirm-text="__('Are you sure you want to delete segment :segmentName?', ['segmentName' => $segment->name])">
                                        <x-mailcoach::icon-label icon="fa-trash-alt" :text="__('Delete')" :caution="true"/>
                                    </x-mailcoach::form-button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status
            :name="__('segment|segments')"
            :paginator="$segments"
            :total-count="$totalSegmentsCount"
            :show-all-url="route('mailcoach.emailLists.segments', $emailList)">
        </x-mailcoach::table-status>
    @else
        <p class="alert alert-info">
            {{ __("No segments here. So you don't like putting people into groups?") }}
        </p>
    @endif
@endsection
