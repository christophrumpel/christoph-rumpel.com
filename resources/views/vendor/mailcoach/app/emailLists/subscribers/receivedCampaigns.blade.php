<x-mailcoach::layout-subscriber :subscriber="$subscriber" :totalSendsCount="$totalSendsCount">
    @if($sends->count())
        <div class="table-actions">
            <div class="table-filters">
                <x-mailcoach::search :placeholder="__('Filter campaigns…')"/>
            </div>
        </div>

        <table class="table table-fixed">
            <thead>
                <tr>
                    <th>{{ __('Campaign') }}</th>
                    <th class="w-32 th-numeric">{{ __('Opens') }}</th>
                    <th class="w-32 th-numeric">{{ __('Clicks') }}</th>
                    <th class="w-48 th-numeric hidden | xl:table-cell">{{ __('Sent') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sends as $send)
                    <tr>
                        <td class="markup-links">
                            <a class="break-words" href="{{ route('mailcoach.campaigns.summary', $send->campaign) }}">
                                {{ $send->campaign->name }}
                            </a>
                        </td>
                        <td class="td-numeric">{{ $send->opens()->count() }}</td>
                        <td class="td-numeric">{{ $send->clicks()->count() }}</td>
                        <td class="td-numeric hidden | xl:table-cell">{{ $send->sent_at?->toMailcoachFormat() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-mailcoach::table-status
            :name="__('send|sends')"
            :paginator="$sends"
            :total-count="$totalSendsCount"
            :show-all-url="route('mailcoach.emailLists.subscribers', [$subscriber->emailList])"
        ></x-mailcoach::table-status>
    @else
        <x-mailcoach::help>
            {{ __("This user hasn't received any campaign yet.") }}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-subscriber>
