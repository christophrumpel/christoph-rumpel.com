@extends('mailcoach::app.layouts.app', ['title' => __('Lists')])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <span class="breadcrumb">{{ __('Lists') }}</span>
            </li>
        </ul>
    </nav>
@endsection

@section('content')
    <section class="card">
        <div class="table-actions">
            <button class="button" data-modal-trigger="create-list">
                <x-mailcoach::icon-label icon="fa-address-book" :text="__('Create list')" />
            </button>

            <x-mailcoach::modal :title="__('Create list')" name="create-list" :open="$errors->any()">
                @include('mailcoach::app.emailLists.partials.create')
            </x-mailcoach::modal>

            @if($emailLists->count() || $searching)
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter lists…')"/>
                </div>
            @endif
        </div>

        @if($emailLists->count())
            <table class="table table-fixed">
                <thead>
                <tr>
                    <x-mailcoach::th sort-by="name" sort-default>{{ __('Name') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-active_subscribers_count" class="w-32 th-numeric">{{ __('Active') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-created_at" class="w-48 th-numeric hidden | md:table-cell">{{ __('Created') }}</x-mailcoach::th>
                    <th class="w-12"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($emailLists as $emailList)
                    <tr>
                        <td class="markup-links">
                            <a class="break-words" href="{{ route('mailcoach.emailLists.subscribers', $emailList) }}">
                                {{ $emailList->name }}
                            </a>
                        </td>
                        <td class="td-numeric">{{ $emailList->active_subscribers_count }}</td>
                        <td class="td-numeric hidden | md:table-cell">
                            {{ $emailList->created_at->toMailcoachFormat() }}
                        </td>
                        <td class="td-action">
                            <div class="dropdown" data-dropdown>
                                <button class="icon-button" data-dropdown-trigger>
                                    <i class="fas fa-ellipsis-v | dropdown-trigger-rotate"></i>
                                </button>
                                <ul class="dropdown-list dropdown-list-left | hidden" data-dropdown-list>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.emailLists.delete', $emailList)"
                                            method="DELETE"
                                            data-confirm="true"
                                            :data-confirm-text="__('Are you sure you want to delete list :emailListName?', ['emailListName' => $emailList->name])"
                                        >
                                            <x-mailcoach::icon-label icon="fa-trash-alt" :text="__('Delete')" :caution="true" />
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
                :name="__('list|lists')"
                :paginator="$emailLists"
                :total-count="$totalEmailListsCount"
                :show-all-url="route('mailcoach.emailLists')"
            ></x-mailcoach::table-status>

        @else
            <p class="alert alert-info">
                @if ($searching)
                    {{ __('No email lists found.') }}
                @else
                    {{ __("You'll need at least one list to gather subscribers.") }}
                @endif
            </p>
        @endif
    </section>
@endsection
