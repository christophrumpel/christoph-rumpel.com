<form class="form-grid" action="{{ route('mailcoach.emailLists.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')"  name="name" :placeholder="__('Subscribers')" required />
    <x-mailcoach::text-field :label="__('From email')" :placeholder="auth()->user()->email" name="default_from_email" type="email" required />
    <x-mailcoach::text-field :label="__('From name')" :placeholder="auth()->user()->name" name="default_from_name" />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create list')" />
        <button type="button" class="button-cancel" data-modal-dismiss>
            {{ __('Cancel') }}
        </button>
    </div>
</form>
