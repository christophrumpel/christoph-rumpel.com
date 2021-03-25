<x-mailcoach::automation-action :index="$index" :action="$action" :editing="$editing" :editable="$editable" :deletable="$deletable">
    <x-slot name="legend">
        {{__('Wait for ') }}
        <span class="legend-accent">
            {{ ($length && $unit && $interval = \Carbon\CarbonInterval::createFromDateString("{$length} {$unit}")) ? $interval->cascade()->forHumans() : '…' }}
        </span>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-8 sm:col-span-4">
            <x-mailcoach::text-field
                :label="__('Length')"
                :required="true"
                name="length"
                wire:model="length"
                type="number"
            />
        </div>

        <div class="col-span-4 sm:col-span-2">
        <x-mailcoach::select-field
            :label="__('Unit')"
            :required="true"
            name="unit"
            wire:model="unit"
            :options="
                collect($units)
                    ->mapWithKeys(fn ($label, $value) => [$value => \Illuminate\Support\Str::plural($label, (int) $length)])
                    ->toArray()
            "
        />
        </div>
    </x-slot>
</x-mailcoach::automation-action>
