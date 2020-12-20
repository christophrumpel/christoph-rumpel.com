<form class="form-grid" action="{{ route('mailcoach.emailLists.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')"  name="name" :placeholder="__('Subscribers')" required />
    <x-mailcoach::text-field :label="__('From email')" :placeholder="auth()->user()->email" name="default_from_email" type="email" required />
    <x-mailcoach::text-field :label="__('From name')" :placeholder="auth()->user()->name" name="default_from_name" />
    <x-mailcoach::text-field :label="__('Reply-to email')" :placeholder="auth()->user()->email" name="default_reply_to_email" type="email" />
    <x-mailcoach::text-field :label="__('Reply-to name')" :placeholder="auth()->user()->name" name="default_reply_to_name" />

    <div class="form-buttons">
        <button class="button">
            <x-mailcoach::icon-label icon="fa-address-book" :text="__('Create list')" />
        </button>
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
