<x-mailcoach::layout-main :title="__('Emails')">
    <div class="table-actions">
        <x-mailcoach::button data-modal-trigger="create-automation-mail" :label="__('Create email')"/>

        <x-mailcoach::modal :title="__('Create email')" name="create-automation-mail" :open="$errors->any()">
            @include('mailcoach::app.automations.mails.partials.create')
        </x-mailcoach::modal>

        @if($totalMailsCount)
            <div class="table-filters">
                <x-mailcoach::search :placeholder="__('Filter emails…')"/>
            </div>
        @endif
    </div>

    @if($totalMailsCount)
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="name">{{ __('Name') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-sent_to_number_of_subscribers" class="w-24 th-numeric">{{ __('Emails') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-unique_open_count" class="w-24 th-numeric hidden | xl:table-cell">{{ __('Opens') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-unique_click_count" class="w-24 th-numeric hidden | xl:table-cell">{{ __('Clicks') }}</x-mailcoach::th>
                <x-mailcoach::th sort-by="-sent" sort-default
                                 class="w-48 th-numeric hidden | xl:table-cell">{{ __('Created at') }}</x-mailcoach::th>
                <x-mailcoach::th class="w-12"></x-mailcoach::th>
            </tr>
            </thead>
            <tbody>
            @foreach($mails as $mail)
                @include('mailcoach::app.automations.mails.partials.row')
            @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status :name="__('mail|mails')" :paginator="$mails"
                                   :total-count="$totalMailsCount"
                                   :show-all-url="route('mailcoach.automations.mails')"></x-mailcoach::table-status>
    @else
        <x-mailcoach::help>
            {{ __('No automated mails yet. ') }}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-main>
