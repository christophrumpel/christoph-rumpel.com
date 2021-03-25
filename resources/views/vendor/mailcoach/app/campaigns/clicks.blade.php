<x-mailcoach::layout-campaign :title="__('Clicks')" :campaign="$campaign">
    @if($campaign->track_clicks)
        @if($campaign->click_count)
            <div class="table-actions">
                <div class="table-filters">
                    <x-mailcoach::search :placeholder="__('Filter clicks…')" />
                </div>
            </div>

            <table class="table table-fixed">
                <thead>
                    <tr>
                        <x-mailcoach::th sort-by="link">{{ __('Link') }}</x-mailcoach::th>
                        <x-mailcoach::th>{{ __('Tag') }}</x-mailcoach::th>

                        <x-mailcoach::th sort-by="-unique_click_count" class="w-32 th-numeric hidden | xl:table-cell">{{ __('Unique Clicks') }}</x-mailcoach::th>
                        <x-mailcoach::th sort-by="-click_count" class="w-32 th-numeric">{{ __('Clicks') }}</x-mailcoach::th>
                    <tr>
                </thead>
                <tbody>
                    @foreach($links as $link)
                    <tr>
                        <td class="markup-links"><a class="break-words" href="{{ $link->url }}">{{ $link->url }}</a></td>
                        <td><span class="tag-neutral">{{ \Spatie\Mailcoach\Domain\Shared\Support\LinkHasher::hash($campaign, $link->url) }}</span></td>
                        <td class="td-numeric hidden | xl:table-cell">{{ $link->unique_click_count }}</td>
                        <td class="td-numeric">{{ $link->click_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <x-mailcoach::table-status
                :name="__('link|links')"
                :paginator="$links"
                :total-count="$totalLinksCount"
                :show-all-url="route('mailcoach.campaigns.clicks', $campaign)"
            ></x-mailcoach::table-status>
        @else
            <x-mailcoach::help>
                {{ __('No clicks yet. Stay tuned.') }}
            </x-mailcoach::help>
        @endif
    @else
        <x-mailcoach::help>
            {{ __('Click tracking was not enabled for this campaign.') }}
        </x-mailcoach::help>
    @endif
</x-mailcoach::layout-campaign>
