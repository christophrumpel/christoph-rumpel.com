<tr class="tr-h-double">
    <td class="markup-links">
        <a href="{{ route('mailcoach.automations.mails.summary', $mail) }}">
            {{ $mail->name }}
        </a>
    </td>
    <td class="td-numeric">
        {{ number_format($mail->sent_to_number_of_subscribers) ?: '–' }}
    </td>
    <td class="td-numeric hidden | xl:table-cell">
        @if($mail->open_rate)
            {{ number_format($mail->unique_open_count) }}
            <div class="td-secondary-line">{{ $mail->open_rate / 100 }}%</div>
        @else
            –
        @endif
    </td>
    <td class="td-numeric hidden | xl:table-cell">
        @if($mail->click_rate)
            {{ number_format($mail->unique_click_count) }}
            <div class="td-secondary-line">{{ $mail->click_rate / 100 }}%</div>
        @else
            –
        @endif
    <td class="td-numeric hidden | xl:table-cell">
        {{ $mail->created_at->toMailcoachFormat() }}
    </td>

    <td class="td-action">
         <x-mailcoach::dropdown direction="left">
            <ul>
                <li>
                    <x-mailcoach::form-button
                        :action="route('mailcoach.automations.mails.duplicate', $mail)"
                    >
                        <x-mailcoach::icon-label icon="fas fa-random" :text="__('Duplicate')" />
                    </x-mailcoach::form-button>
                </li>
                <li>
                    <x-mailcoach::form-button
                        :action="route('mailcoach.automations.mails.delete', $mail)"
                        method="DELETE"
                        data-confirm="true"
                        :data-confirm-text="__('Are you sure you want to delete email :name?', ['name' => $mail->name])"
                    >
                        <x-mailcoach::icon-label icon="far fa-trash-alt" :text="__('Delete')" :caution="true" />
                    </x-mailcoach::form-button>
                </li>
            </ul>
        </x-mailcoach::dropdown>
    </td>
</tr>
