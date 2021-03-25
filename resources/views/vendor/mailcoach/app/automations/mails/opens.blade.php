<x-mailcoach::layout-automation-mail :title="__('Opens')" :mail="$mail">
    @if($mail->track_opens)
        @if($mail->open_count)
            <div class="table-actions">
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter opens…')" />
                </div>
            </div>

            <table class="table table-fixed">
                <thead>
                    <tr>
                        <x-mailcoach::th sort-by="email">{{ __('Email') }}</x-mailcoach::th>
                        <x-mailcoach::th sort-by="open_count" class="w-32 th-numeric">{{ __('Opens') }}</x-mailcoach::th>
                        <x-mailcoach::th sort-by="-first_opened_at" sort-default class="w-48 th-numeric hidden | xl:table-cell">{{ __('First opened at') }}</x-mailcoach::th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mailOpens as $mailOpen)
                        <tr>
                            <td class="markup-links">
                                <a class="break-words" href="{{ route('mailcoach.emailLists.subscriber.details', [$mailOpen->subscriber_email_list_id, $mailOpen->subscriber_id]) }}">
                                    {{ $mailOpen->subscriber_email }}
                                </a>
                            </td>
                            <td class="td-numeric">{{ $mailOpen->open_count }}</td>
                            <td class="td-numeric hidden | xl:table-cell">{{ $mailOpen->first_opened_at->toMailcoachFormat() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <x-mailcoach::table-status
                :name="__('open|opens')"
                :paginator="$mailOpens"
                :total-count="$totalMailOpensCount"
                :show-all-url="route('mailcoach.automations.mails.opens', $mail)"
            ></x-mailcoach::table-status>
        @else
            <x-mailcoach::help>
                {{ __('No opens yet. Stay tuned.') }}
            </x-mailcoach::help>
        @endif
    @else
        <x-mailcoach::help>
            {{ __('Open tracking was not enabled for this mail.') }}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-automation-mail>
