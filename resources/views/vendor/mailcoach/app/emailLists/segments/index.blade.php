<x-mailcoach::layout-list :title="__('Segments')" :emailList="$emailList">
    <div class="table-actions">
        <div class=buttons>
            <x-mailcoach::button data-modal-trigger="create-segment" :label="__('Add segment')"/>

            <x-mailcoach::modal :title="__('Create segment')" name="create-segment" :open="$errors->any()">
                @include('mailcoach::app.emailLists.segments.partials.create')
            </x-mailcoach::modal>
        </div>
    </div>

    @if($emailList->segments()->count())
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="name">{{ __('Name') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-created_at" class="w-48 th-numeric hidden | xl:table-cell">{{ __('Created at') }}</x-mailcoach::th>
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
                    <td class="td-numeric hidden | xl:table-cell">{{ $segment->created_at->toMailcoachFormat() }}</td>
                    <td class="td-action">
                        <x-mailcoach::dropdown direction="left">
                            <ul>
                                <li>
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.emailLists.segment.duplicate', [$segment->emailList, $segment])"
                                    >
                                        <x-mailcoach::icon-label icon="fas fa-random" :text="__('Duplicate')" />
                                    </x-mailcoach::form-button>
                                </li>
                                <li>
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.emailLists.segment.delete', [$segment->emailList, $segment])"
                                        method="DELETE" data-confirm="true" :data-confirm-text="__('Are you sure you want to delete segment :segmentName?', ['segmentName' => $segment->name])">
                                        <x-mailcoach::icon-label icon="far fa-trash-alt" :text="__('Delete')" :caution="true"/>
                                    </x-mailcoach::form-button>
                                </li>
                            </ul>
                        </x-mailcoach::dropdown>
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
        <x-mailcoach::help>
            {{ __("No segments here. So you don't like putting people into groups?") }}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-list>
