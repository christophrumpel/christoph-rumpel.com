<x-mailcoach::fieldset :focus="$editing">
    <x-slot name="legend">
        <header class="flex items-center space-x-2">
            <span class="w-6 h-6 rounded-full inline-flex items-center justify-center text-xs leading-none font-semibold bg-yellow-200 text-yellow-700">
                {{ $index + 1 }}
            </span>
            <span class="font-normal">
                {{ $legend ?? $action['class']::getName() }}
            </span>
        </header>
    </x-slot>

    <div class="flex items-center absolute top-4 right-6 space-x-3 z-20">
        @if ($editing)
            <button type="button" wire:click="save">
                <i class="icon-button hover:text-green-500 fas fa-check"></i>
            </button>
        @elseif ($editable)
            <button type="button" wire:click="edit">
                <i class="icon-button far fa-edit"></i>
            </button>
        @endif
        @if ($deletable)
            <button type="button" onclick="confirm('{{ __('Are you sure you want to delete this action?') }}') || event.stopImmediatePropagation()" wire:click="delete">
                <i class="icon-button hover:text-red-500 far fa-trash-alt"></i>
            </button>
        @endif
    </div>

    @if ($editing)
        <div class="form-actions">
            {{ $form ?? '' }}
        </div>
    @else
        @if($content ?? false)
            <div>
                {{ $content }}
            </div>
        @endif

        <dl class="-mx-6 -mb-6 px-6 py-2 text-right text-xs text-gray-500  bg-gray-300 bg-opacity-10">
            Active
            <span class="font-semibold variant-numeric-tabular">{{ number_format($action['active'] ?? 0) }}</span>
            <span class="text-gray-400 px-2">•</span>
            Completed
            <span class="font-semibold variant-numeric-tabular">{{ number_format($action['completed'] ?? 0) }}</span>
        </dl>
    @endif
</x-mailcoach::fieldset>
