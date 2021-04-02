<x-mailcoach::layout-list 
    :title="$subscriber->email"
    :originTitle="__('Subscribers')"
    :originHref="route('mailcoach.emailLists.subscribers', ['emailList' => $subscriber->emailList])" 
    :emailList="$subscriber->emailList"
>
    <nav class="tabs">
        <ul>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.subscriber.details', [$subscriber->emailList, $subscriber])">
                {{ __('Profile') }}
            </x-mailcoach::navigation-item>
            <x-mailcoach::navigation-item :href="route('mailcoach.emailLists.subscriber.receivedCampaigns', [$subscriber->emailList, $subscriber])">
                <x-mailcoach::icon-label :text="__('Received campaigns')" invers :count="$totalSendsCount" />
            </x-mailcoach::navigation-item>
        </ul>
    </nav>

    {{ $slot }}
</x-mailcoach::layout-list>
