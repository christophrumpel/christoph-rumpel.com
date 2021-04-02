<x-mailcoach::layout-automation-mail :title="__('Unsubscribes')" :mail="$mail">
    @if($unsubscribes->count())
    <div class="table-actions">
        <div class="table-filters">
            <x-mailcoach::search :placeholder="__('Filter unsubscribes…')" />
        </div>
    </div>

    <table class="table table-fixed">
        <thead>
        <tr>
            <th>{{ __('Email') }}</th>
            <th class="w-48 th-numeric hidden | xl:table-cell">{{ __('Date') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($unsubscribes as $unsubscribe)
            <tr>
                <td class="markup-links">
                    <a class="break-words" href="{{ route('mailcoach.emailLists.subscriber.details', [$unsubscribe->subscriber->emailList, $unsubscribe->subscriber]) }}">
                        {{ $unsubscribe->subscriber->email }}
                    </a>
                    <div class="td-secondary-line">
                        {{ $unsubscribe->subscriber->first_name }} {{ $unsubscribe->subscriber->last_name }}
                    </div>
                </td>
                <td class="td-numeric hidden | xl:table-cell">{{ $unsubscribe->created_at->toMailcoachFormat() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <x-mailcoach::table-status
        :name="__('unsubscribe|unsubscribers')"
        :paginator="$unsubscribes"
        :total-count="$totalUnsubscribes"
        :show-all-url="route('mailcoach.automations.mails.unsubscribes', $mail)"
    ></x-mailcoach::table-status>

    @else
        <x-mailcoach::success>
            {{ __('No unsubscribes have been received yet.') }}
        </x-mailcoach::success>
    @endif
</x-mailcoach::layout-automation-mail>
