<form class="form-grid" action="{{ route('mailcoach.campaigns.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Newsletter #1')" required />

    <x-mailcoach::select-field :label="__('Email list')" :options="$emailListOptions" name="email_list_id" required />

    @if($templateOptions->count() > 1)
        <x-mailcoach::select-field :label="__('Template')" :options="$templateOptions" name="template_id" />
    @endif

    <div class="form-buttons">
        <button class="button">
            <x-mailcoach::icon-label icon="fa-envelope-open" :text="__('Create campaign')" />
        </button>
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
