<x-mailcoach::layout-main :title="__('Transactional log')">
    <div class="table-actions">
        @if($transactionalMailsCount)
            <div class="table-filters">
                <x-mailcoach::search :placeholder="__('Filter transactional mails…')"/>
            </div>
        @endif
    </div>

    @if($transactionalMailsCount)
        <table class="table table-fixed">
            <thead>
            <tr>
                <x-mailcoach::th sort-by="subject">{{ __('Subject') }}</x-mailcoach::th>
                <x-mailcoach::th>{{ __('To') }}</x-mailcoach::th>
                <x-mailcoach::th class="w-24 th-numeric hidden | xl:table-cell">
                    {{ __('Opens') }}
                </x-mailcoach::th>
                <x-mailcoach::th class="w-24 th-numeric hidden | xl:table-cell">
                    {{ __('Clicks') }}
                </x-mailcoach::th>
                <x-mailcoach::th sort-by="-created_at" sort-default class="w-48 th-numeric hidden | xl:table-cell">{{ __('Sent') }}
                </x-mailcoach::th>
                <x-mailcoach::th class="w-12"></x-mailcoach::th>

            </tr>
            </thead>
            <tbody>
            @foreach($transactionalMails as $transactionalMail)
                <tr class="markup-links">
                    <td><a href="{{ route('mailcoach.transactionalMail.show', $transactionalMail) }}">{{ $transactionalMail->subject }}</a></td>
                    <td class="truncate">{{ $transactionalMail->toString() }}</td>
                    <td class="td-numeric hidden | xl:table-cell">{{ $transactionalMail->opens->count() }}</td>
                    <td class="td-numeric hidden | xl:table-cell">{{ $transactionalMail->clicks->count() }}</td>
                    <td class="td-numeric hidden | xl:table-cell">{{ $transactionalMail->created_at }}</td>
                    <td class="td-action">
                        <x-mailcoach::dropdown direction="left">
                            <ul>
                                <li>
                                    <x-mailcoach::form-button
                                        :action="route('mailcoach.transactionalMail.delete', $transactionalMail)"
                                        method="DELETE"
                                        data-confirm="true"
                                        :data-confirm-text="__('Are you sure you want to delete this transactional mail from the log?')"
                                    >
                                        <x-mailcoach::icon-label icon="far fa-trash-alt" :text="__('Delete')" :caution="true" />
                                    </x-mailcoach::form-button>
                                </li>
                            </ul>
                        </x-mailcoach::dropdown>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status :name="__('mail|mails')" :paginator="$transactionalMails" :total-count="$transactionalMailsCount"
                                    :show-all-url="route('mailcoach.transactionalMails')"></x-mailcoach::table-status>
    @else
        <x-mailcoach::help>
            {!! __('No transactional mails have been sent yet!') !!}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-main>
