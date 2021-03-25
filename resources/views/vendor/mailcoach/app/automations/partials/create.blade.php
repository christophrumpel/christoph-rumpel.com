<form class="form-grid" action="{{ route('mailcoach.automations.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Automation name')" required />

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create automation')"/>
        <x-mailcoach::button-cancel :label="__('Cancel')"/>
    </div>
</form>
