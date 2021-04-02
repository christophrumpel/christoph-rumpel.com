<x-mailcoach::automation-action :index="$index" :action="$action" :editing="$editing" :editable="$editable" :deletable="$deletable">
    <x-slot name="legend">
        {{__('Send email') }}
        <span class="legend-accent">
            @if ($automation_mail_id)
                {{ optional(\Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::find($automation_mail_id))->name }}
            @endif
        </span>
    </x-slot> 

    <x-slot name="form">
        <div class="col-span-12 md:col-span-6">
            <x-mailcoach::select-field
                :label="__('Email')"
                name="automation_mail_id"
                wire:model="automation_mail_id"
                :options="['' => 'Select an email'] + $campaignOptions"
            />
    </x-slot>

</x-mailcoach::automation-action>
