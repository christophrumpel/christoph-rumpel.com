@extends('mailcoach::app.layouts.app', [
    'title' => (isset($titlePrefix) ?  $titlePrefix . ' | ' : '') . $tag->name
])

@section('header')
    <nav>
        <ul class="breadcrumbs">
            <li>
                <a href="{{ route('mailcoach.emailLists') }}">
                    <span class="breadcrumb">{{ __('Lists') }}</span>
                </a>
            </li>
            <li><a href="{{ route('mailcoach.emailLists.subscribers', $tag->emailList) }}"><span class="breadcrumb">{{ $tag->emailList->name }}</span></a></li>
            <li><a href="{{ route('mailcoach.emailLists.segments', $tag->emailList) }}"><span class="breadcrumb">{{ __('Tags') }}</span></a></li>
            @yield('breadcrumbs')
        </ul>
    </nav>
@endsection

@section('content')
    <nav class="tabs">
        <ul>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.tag.edit', [$tag->emailList, $tag])">
                <x-mailcoach::icon-label icon="fa-tag" :text="__('Tag details')" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>

    <section class="card">
        @yield('tag')
    </section>
@endsection
