@extends('mailcoach::app.emailLists.layouts.edit', [
    'emailList' => $emailList,
    'titlePrefix' => __('Tags'),
])

@section('breadcrumbs')
    <li>
        <a href="{{ route('mailcoach.emailLists.subscribers', $emailList) }}">
            <span class="breadcrumb">{{ $emailList->name }}</span>
        </a>
    </li>
    <li>
        <span class="breadcrumb">{{ __('Tags') }}</span>
    </li>
@endsection

@section('emailList')
    <div class="table-actions">
        <button class="button" data-modal-trigger="create-tag">
            <x-mailcoach::icon-label icon="fa-tag" :text="__('Create tag')"/>
        </button>

        <x-mailcoach::modal :title="__('Create tag')" name="create-tag" :open="$errors->any()">
            @include('mailcoach::app.emailLists.tag.partials.create')
        </x-mailcoach::modal>

        @if($tags->count() || $searching)
            <div class="table-filters">
                <x-mailcoach::search :placeholder="__('Filter tags…')"/>
            </div>
        @endif
    </div>

    @if($tags->count())
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="name" sort-default>{{ __('Name') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="subscriber_count" class="w-32 th-numeric">{{ __('Subscribers') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="updated_at" class="w-48 th-numeric hidden | md:table-cell">{{ __('Updated at') }}</x-mailcoach::th>
                <th class="w-12"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td class="markup-links">
                        <a class="break-words" href="{{ route('mailcoach.emailLists.tag.edit', [$emailList, $tag]) }}">
                            {{ $tag->name }}
                        </a>
                    </td>
                    <td class="td-numeric">{{ $tag->subscriber_count }}</td>
                    <td class="td-numeric hidden | md:table-cell">{{ $tag->updated_at->toMailcoachFormat() }}</td>

                    <td class="td-action">
                        <x-mailcoach::form-button
                            :action="route('mailcoach.emailLists.tag.delete', [$emailList, $tag])"
                            method="DELETE"
                            data-confirm="true"
                            :data-confirm-text="__('Are you sure you want to delete tag :tagName?', ['tagName' => $tag->name])"
                            class="icon-button hover:text-red-500"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </x-mailcoach::form-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status
            :name="__('tag|tags')"
            :paginator="$tags"
            :total-count="$totalTagsCount"
            :show-all-url="route('mailcoach.emailLists.tags', $emailList)"
        ></x-mailcoach::table-status>
    @else
        <p class="alert alert-info">
            @if($searching)
                {{ __('No tags found') }}
            @else
                {{ __('There are no tags for this list. Everyone equal!') }}
            @endif
        </p>
    @endif
@endsection
