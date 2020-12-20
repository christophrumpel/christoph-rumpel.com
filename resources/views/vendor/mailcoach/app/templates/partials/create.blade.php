<form class="form-grid" action="{{ route('mailcoach.templates.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Newsletter template')" required />

    <div class="form-buttons">
        <button class="button">
            <x-mailcoach::icon-label icon="fa-clipboard" :text="__('Create template')"/>
        </button>
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
