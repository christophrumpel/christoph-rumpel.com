@extends('mailcoach::app.layouts.app', ['title' => 'Templates'])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li><span class="breadcrumb">{{ __('Templates') }}</span></li>
        </ul>
    </nav>
@endsection

@section('content')
    <section class="card">
        <div class="table-actions">
            <button class="button" data-modal-trigger="create-template">
                <x-mailcoach::icon-label icon="fa-clipboard" :text="__('Create template')"/>
            </button>

            <x-mailcoach::modal :title="__('Create template')" name="create-template" :open="$errors->any()">
                @include('mailcoach::app.templates.partials.create')
            </x-mailcoach::modal>

            @if($templates->count() || $searching)
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter templates…')"/>
                </div>
            @endif
        </div>

        @if($templates->count())
            <table class="table table-fixed">
                <thead>
                <tr>
                    <x-mailcoach::th sort-by="name" sort-default>{{ __('Name') }}</x-mailcoach::th>
                    <x-mailcoach::th sort-by="-updated_at" class="w-48 th-numeric">{{ __('Last updated') }}</x-mailcoach::th>
                    <th class="w-12"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($templates as $template)
                    <tr>
                        <td class="markup-links">
                            <a class="break-words" href="{{ route('mailcoach.templates.edit', $template) }}">
                                {{ $template->name }}
                            </a>
                        </td>
                        <td class="td-numeric">{{ $template->updated_at->toMailcoachFormat() }}</td>
                        <td class="td-action">
                            <div class="dropdown" data-dropdown>
                                <button class="icon-button" data-dropdown-trigger>
                                    <i class="fas fa-ellipsis-v | dropdown-trigger-rotate"></i>
                                </button>
                                <ul class="dropdown-list dropdown-list-left | hidden" data-dropdown-list>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.templates.duplicate', $template)"
                                        >
                                            <x-mailcoach::icon-label icon="fa-random" :text="__('Duplicate')" />
                                        </x-mailcoach::form-button>
                                    </li>
                                    <li>
                                        <x-mailcoach::form-button
                                            :action="route('mailcoach.templates.delete', $template)"
                                            method="DELETE"
                                            data-confirm="true"
                                            :data-confirm-text="__('Are you sure you want to delete template :template?', ['template' => $template->name])"
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
                :name="__('template|templates')"
                :paginator="$templates"
                :total-count="$totalTemplatesCount"
                :show-all-url="route('mailcoach.templates')"
            ></x-mailcoach::table-status>

        @else
            <p class="alert alert-info">
                @if ($searching)
                    {{ __('No templates found.') }}
                @else
                    {{ __('DRY? No templates here.') }}
                @endif
            </p>
        @endif
    </section>
@endsection
