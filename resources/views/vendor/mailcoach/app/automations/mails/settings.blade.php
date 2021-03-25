<x-mailcoach::layout-automation-mail :title="__('Settings')" :mail="$mail">
    <form
        class="form-grid"
        action="{{ route('mailcoach.automations.mails.settings', $mail) }}"
        method="POST"
        data-dirty-check
    >
        @csrf
        @method('PUT')

        <x-mailcoach::text-field :label="__('Name')" name="name" :value="$mail->name" required  />

        <x-mailcoach::text-field :label="__('Subject')" name="subject" :value="$mail->subject"  />

        <x-mailcoach::fieldset :legend="__('Tracking')">
            <div class="form-field">
                <label class="label">{{ __('Track when…') }}</label>
                <div class="checkbox-group">
                    <x-mailcoach::checkbox-field :label="__('Someone opens this email')" name="track_opens" :checked="$mail->track_opens" />
                    <x-mailcoach::checkbox-field :label="__('Links in the email are clicked')" name="track_clicks" :checked="$mail->track_clicks" />
                </div>
            </div>

            <div class="form-field">
                <label class="label">{{ __('UTM Tags') }}</label>
                <div class="checkbox-group">
                    <x-mailcoach::checkbox-field :label="__('Automatically add UTM tags')" name="utm_tags" :checked="$mail->utm_tags" />
                </div>
            </div>

            <x-mailcoach::help>
                <p class="text-sm mb-2">{{ __('When checked, the following UTM Tags will automatically get added to any links in your campaign:') }}</p>
                <ul>
                    <li><strong>utm_source</strong>: newsletter</li>
                    <li><strong>utm_medium</strong>: email</li>
                    <li><strong>utm_campaign</strong>: {{ $mail->name }}</li>
                </ul>
            </x-mailcoach::help>
        </x-mailcoach::fieldset>

            <div class="form-buttons">
                <x-mailcoach::button :label="__('Save settings')" />
            </div>
    </form>
</x-mailcoach::layout-automation-mail>
