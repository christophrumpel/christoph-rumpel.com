<x-mailcoach::layout-transactional-template title="Details" :template="$template">
    <form
        class="form-grid"
        method="POST"
    >
        @csrf
        @method('PUT')

        <x-mailcoach::fieldset :legend="__('Recipients')">
            <x-mailcoach::help>
                These recipients will be merged with the ones when the mail is sent. You can specify multiple recipients comma separated
            </x-mailcoach::help>
            <x-mailcoach::text-field placeholder="john@example.com, jane@example.com" :label="__('To')" name="to" :value="$template->toString()"/>
            <x-mailcoach::text-field placeholder="john@example.com, jane@example.com" :label="__('Cc')" name="cc" :value="$template->ccString()"/>
            <x-mailcoach::text-field placeholder="john@example.com, jane@example.com" :label="__('Bcc')" name="bcc" :value="$template->bccString()"/>
        </x-mailcoach::fieldset>

        <x-mailcoach::text-field :label="__('Subject')" name="subject" :value="$template->subject" required/>

        {!! app(config('mailcoach.transactional.editor'))->render($template) !!}
    </form>

    <x-mailcoach::modal :title="__('Preview') . ' - ' . $template->subject" name="preview" large :open="Request::get('modal')">
        <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
    </x-mailcoach::modal>

    @if($template->canBeTested())
        <x-mailcoach::modal :title="__('Send Test')" name="send-test">
            @include('mailcoach::app.transactionalMails.templates.partials.test')
        </x-mailcoach::modal>
    @endif

    <x-mailcoach::transactional-mail-template-replacer-help-texts :template="$template"/>


</x-mailcoach::layout-transactional-template>
