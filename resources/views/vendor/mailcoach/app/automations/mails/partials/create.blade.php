<form class="form-grid" action="{{ route('mailcoach.automations.mails.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Email name')" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create email')" />
        <x-mailcoach::button-cancel />
    </div>
</form>
