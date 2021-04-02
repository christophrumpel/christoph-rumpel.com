<x-mailcoach::layout-automation-mail :title="__('Content')" :mail="$mail">

    <form
        class="form-grid"
        action="{{ route('mailcoach.automations.mails.updateContent', $mail) }}"
        method="POST"
        data-dirty-check
    >
        @csrf
        @method('PUT')
        {!! app(config('mailcoach.automation.editor'))->render($mail) !!}
    </form>

    <x-mailcoach::modal :title="__('Preview') . ' - ' . $mail->subject" name="preview" large :open="Request::get('modal')">
        <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
    </x-mailcoach::modal>

    <x-mailcoach::modal :title="__('Send Test')" name="send-test">
        @include('mailcoach::app.automations.mails.partials.test')
    </x-mailcoach::modal>

    <x-mailcoach::automation-mail-replacer-help-texts />

</x-mailcoach::layout-automation-mail>
