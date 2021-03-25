<div>
    <input type="hidden" name="actions" value="{{ json_encode($actions) }}">

    @foreach ($actions as $index => $action)
        @if($loop->first)
            @include('mailcoach::app.automations.components.actionDropdown', ['index' => $index])
        @endif

        <div>
            @if ($action['class']::getComponent())
                @livewire($action['class']::getComponent(), array_merge([
                    'index' => $index,
                    'uuid' => $action['uuid'],
                    'action' => $action,
                    'automation' => $automation,
                ], ($action['data'] ?? [])), key($index . $action['uuid']))
            @else
                @livewire('automation-action', array_merge([
                    'index' => $index,
                    'uuid' => $action['uuid'],
                    'action' => $action,
                    'automation' => $automation,
                    'editable' => false,
                ], ($action['data'] ?? [])), key($index . $action['uuid']))
            @endif
        </div>

        @unless($loop->last)
            @include('mailcoach::app.automations.components.actionDropdown', ['index' => $index + 1])
        @endunless
    @endforeach

    @include('mailcoach::app.automations.components.actionDropdown', ['index' => $index + 1])
</div>
