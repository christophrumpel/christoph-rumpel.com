@extends('mailcoach::app.layouts.app', ['title' => $template->name])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <a href="{{ route('mailcoach.templates') }}">
                    <span class="breadcrumb">{{ __('Templates') }}</span>
                </a>
            </li>
            <li><span class="breadcrumb">{{ $template->name }}</span></li>
        </ul>
    </nav>
@endsection

@section('content')
    <section class="card">
        <form
            class="form-grid"
            action="{{ route('mailcoach.templates.edit', $template) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <x-mailcoach::text-field :label="__('Name')" name="name" :value="$template->name" required />

            {!! app(config('mailcoach.editor'))->render($template) !!}
        </form>

        <x-mailcoach::replacer-help-texts />
    </section>
@endsection
