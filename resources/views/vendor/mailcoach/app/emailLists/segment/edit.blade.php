@extends('mailcoach::app.emailLists.layouts.segment', ['segment' => $segment])

@section('breadcrumbs')
    <li><span class="breadcrumb">{{ $segment->name }}</span></li>
@endsection

@section('segment')
    <form
        class="form-grid"
        action="{{ route('mailcoach.emailLists.segment.edit',[$segment->emailList, $segment]) }}"
        method="POST"
    >
        @if (! $emailList->tags()->count())
            <x-mailcoach::help>
                <div class="markup-lists">
                    {{ __('A segment is based on tags.') }}
                    <ol class="mt-4">
                        <li>{!! __('<a href=":tagLink">Create some tags</a> for this list first.', ['tagLink' => route('mailcoach.emailLists.tags', $emailList)]) !!}</li>
                        <li>{!! __('Assign these tags to some of the <a href=":subscriberslink">subscribers</a>.', ['subscriberslink' => route('mailcoach.emailLists.subscribers', $emailList)]) !!}</li>
                    </ol>
                </div>
            </x-mailcoach::help>
        @endif

        @csrf
        @method('PUT')

        <x-mailcoach::text-field :label="__('Name')" name="name" :value="$segment->name" type="name" required />

        <div class="form-row">
            <label class=label>{{ __('Include with tags') }}</label>
            <div class="flex items-end">
                <div class="flex-none">
                    <x-mailcoach::select-field
                        name="positive_tags_operator"
                        :value="$segment->all_positive_tags_required ? 'all' : 'any'"
                        :options="['any' => __('Any'), 'all' => __('All')]"
                    />
                </div>
                <div class="ml-2 flex-grow">
                    <x-mailcoach::tags-field
                        name="positive_tags"
                        :value="$segment->positiveTags()->pluck('name')->toArray()"
                        :tags="$emailList->tags()->pluck('name')->toArray()"
                    />
                </div>
            </div>
        </div>

        <div class="form-row">
            <label class=label>{{ __('Exclude with tags') }}</label>
            <div class="flex items-end">
                <div class="flex-none">
                    <x-mailcoach::select-field
                        name="negative_tags_operator"
                        :value="$segment->all_negative_tags_required ? 'all' : 'any'"
                        :options="['any' => __('Any'), 'all' => __('All')]"
                    />
                </div>
                <div class="ml-2 flex-grow">
                    <x-mailcoach::tags-field
                        name="negative_tags"
                        :value="$segment->negativeTags()->pluck('name')->toArray()"
                        :tags="$emailList->tags()->pluck('name')->toArray()"
                    />
                </div>
            </div>
        </div>


        <div class="form-buttons">
            <button type="submit" class="button">
                <x-mailcoach::icon-label icon="fa-chart-pie" :text="__('Save')" />
            </button>
        </div>
    </form>
@endsection
