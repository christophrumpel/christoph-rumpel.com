<form class="form-grid" action="{{ route('mailcoach.templates.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Newsletter template')" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create template')" />
        <x-mailcoach::button-cancel />
    </div>
</form>
