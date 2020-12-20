<ul class="navigation">
    @include('mailcoach::app.layouts.partials.beforeFirstMenuItem')
    <x-mailcoach::navigation-item :href="route('mailcoach.campaigns')">
        <span class="icon-label">
            <i class="fas fa-envelope-open"></i>
            <span class="icon-label-text">{{ __('Campaigns') }}</span>
        </span>
    </x-mailcoach::navigation-item>

    <x-mailcoach::navigation-item :href="route('mailcoach.emailLists')">
        <span class="icon-label">
            <i class="fas fa-address-book"></i>
            <span class="icon-label-text">{{ __('Lists') }}</span>
        </span>
    </x-mailcoach::navigation-item>
    <x-mailcoach::navigation-item :href="route('mailcoach.templates')">
        <span class="icon-label">
            <i class="fas fa-clipboard"></i>
            <span class="icon-label-text">{{ __('Templates') }}</span>
        </span>
    </x-mailcoach::navigation-item>
    @include('mailcoach::app.layouts.partials.afterLastMenuItem')
</ul>
