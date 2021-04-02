<form class="form-grid" action="{{ route('mailcoach.campaigns.store') }}" method="POST">
    @csrf

    <x-mailcoach::text-field :label="__('Name')" name="name" :placeholder="__('Newsletter #1')" required />
    <div class="form-grid" data-conditional-type="draft">
        <x-mailcoach::select-field
            :label="__('Email list')"
            :options="$emailListOptions"
            name="email_list_id"
            required
        />

        @if($templateOptions->count() > 1)
            <x-mailcoach::select-field
                :label="__('Template')"
                :options="$templateOptions"
                name="template_id"
            />
        @endif
    </div>

    <div class="form-buttons">
        <x-mailcoach::button :label="__('Create campaign')" />
        <x-mailcoach::button-cancel />
    </div>
</form>
