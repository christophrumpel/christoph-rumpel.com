@if($status === \Spatie\Mailcoach\Enums\CampaignStatus::DRAFT)
    @if($campaign->scheduled_at)
        <i title="{{ __('Scheduled') }}" class="far fa-clock text-orange-500" />
    @else
        <i title="{{ __('Draft') }}" class="far fa-edit text-gray-500" />
    @endif
@elseif ($status === \Spatie\Mailcoach\Enums\CampaignStatus::SENT)
    <i title="{{ __('Sent') }}" class="fas fa-check text-green-500" />
@elseif ($status === \Spatie\Mailcoach\Enums\CampaignStatus::SENDING)
    <i title="{{ __('Sending') }}" class="fas fa-sync fa-spin text-blue-500" />
@elseif ($status === \Spatie\Mailcoach\Enums\CampaignStatus::CANCELLED)
    <i title="{{ __('Cancelled') }}" class="fas fa-ban text-red-500" />
@endif
