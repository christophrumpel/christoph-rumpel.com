<x-mailcoach::select-field
    :label="__('Add action')"
    name="{{ $prefix ?? '' }}action"
    :options="$actionOptions"
    placeholder="Select an action"
    data-conditional="action"
/>

@foreach ($actionOptions as $index => $actionName)
    <div data-conditional-action="{{ $index }}">
        @includeIf(config('mailcoach.automation.flows.actions')[$index]::getConfigView(), ['prefix' => $prefix ?? ''])
    </div>
@endforeach
