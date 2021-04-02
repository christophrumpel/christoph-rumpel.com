<x-mailcoach::layout-campaign :title="__('Content')" :campaign="$campaign">

    <form
        class="form-grid"
        action="{{ route('mailcoach.campaigns.updateContent', $campaign) }}"
        method="POST"
        data-dirty-check
    >
        @csrf
        @method('PUT')
        {!! app(config('mailcoach.campaigns.editor'))->render($campaign) !!}
    </form>

    <x-mailcoach::modal :title="__('Preview') . ' - ' . $campaign->subject" name="preview" large :open="Request::get('modal')">
        <iframe class="absolute" width="100%" height="100%" data-html-preview-target></iframe>
    </x-mailcoach::modal>

    <x-mailcoach::modal :title="__('Send Test')" name="send-test">
        @include('mailcoach::app.campaigns.partials.test')
    </x-mailcoach::modal>

    <x-mailcoach::campaign-replacer-help-texts />

</x-mailcoach::layout-campaign>
