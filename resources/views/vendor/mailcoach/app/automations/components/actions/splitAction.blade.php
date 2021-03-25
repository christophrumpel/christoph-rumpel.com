<x-mailcoach::fieldset :focus="$editing">
    <x-slot name="legend">
        <header class="flex items-center space-x-2">
            <span class="w-6 h-6 rounded-full inline-flex items-center justify-center text-xs leading-none font-semibold bg-yellow-200 text-yellow-700">
                {{ $index + 1 }}
            </span>
            <span class="font-normal whitespace-nowrap">
                {{ __('Branch out') }}
            </span>
        </header>
    </x-slot>

    <div class="flex items-center absolute top-4 right-6 space-x-3 z-20">
        @if ($editing && count($editingActions) === 0)
            <button type="button" wire:click="save">
                <i class="icon-button hover:text-green-500 fas fa-check"></i>
            </button>
        @elseif ($editable && !$editing)
            <button type="button" wire:click="edit">
                <i class="icon-button far fa-edit"></i>
            </button>
        @endif
        @if ($deletable && count($editingActions) === 0)
            <button type="button" onclick="confirm('{{ __('Are you sure you want to delete this action?') }}') || event.stopImmediatePropagation()" wire:click="delete">
                <i class="icon-button hover:text-red-500 far fa-trash-alt"></i>
            </button>
        @endif
    </div>

        <div class="grid gap-6">
            @if ($editing)
                <div class="grid gap-6 w-full">
                    <section class="border-l-4 border-blue-400 bg-white bg-opacity-50">
                        <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-blue-500 border-opacity-20 border-r border-t border-b rounded-r">
                            <div class="flex items-center">
                                <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-blue-400 text-white rounded-br space-x-2">
                                <span class="markup-h4 whitespace-nowrap overflow-ellipsis max-w-xs truncate">
                                    <span class="font-normal">{{ __('Branch') }}</span>
                                    A
                                </span>
                                </h2>
                                <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($leftActions) }} {{ trans_choice('action|actions', count($leftActions)) }}</span>
                                <button class="ml-auto -mr-8" type="button">
                                    <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                    <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div x-show="!collapsed">
                                <livewire:automation-builder name="{{ $uuid }}-left-actions" :automation="$automation" :actions="$leftActions" key="{{ $uuid }}-left-actions" />
                            </div>
                        </div>
                    </section>
                    <section class="border-l-4 border-blue-400 bg-white bg-opacity-50">
                        <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-blue-500 border-opacity-20 border-r border-t border-b rounded-r">
                            <div class="flex items-center">
                                <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-blue-400 text-white rounded-br space-x-2">
                                <span class="markup-h4 whitespace-nowrap overflow-ellipsis max-w-xs truncate">
                                    <span class="font-normal">{{ __('Branch') }}</span>
                                    B
                                </span>
                                </h2>
                                <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($rightActions) }} {{ trans_choice('action|actions', count($rightActions)) }}</span>
                                <button class="ml-auto -mr-8" type="button">
                                    <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                    <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div x-show="!collapsed">
                                <livewire:automation-builder name="{{ $uuid }}-right-actions" :automation="$automation" :actions="$rightActions" key="{{ $uuid}}-right-actions" />
                            </div>
                        </div>
                    </section>
                </div>
            @else
                <div class="grid gap-6 flex-grow">
                    <div class="grid gap-6 w-full">
                        <section class="border-l-4 border-blue-500 bg-white bg-opacity-50">
                            <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-blue-500 border-opacity-20 border-r border-t border-b rounded-r">
                                <div class="flex items-center">
                                    <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-blue-500 text-white rounded-br space-x-2">
                                        <span class="markup-h4 whitespace-nowrap overflow-ellipsis max-w-xs truncate">
                                            <span class="font-normal">{{ __('Branch') }}</span>
                                            A
                                        </span>
                                    </h2>
                                    <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($leftActions) }} {{ trans_choice('action|actions', count($leftActions)) }}</span>
                                    <button class="ml-auto -mr-8" type="button">
                                        <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                        <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div x-show="!collapsed">
                                    @foreach ($leftActions as $index => $action)
                                        @livewire($action['class']::getComponent() ?: 'automation-action', array_merge([
                                            'index' => $index,
                                            'uuid' => $action['uuid'],
                                            'action' => $action,
                                            'automation' => $automation,
                                            'editable' => false,
                                            'deletable' => false,
                                        ], ($action['data'] ?? [])), key('left' . $index . $action['uuid']))
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <section class="border-l-4 border-blue-500 bg-white bg-opacity-50">
                            <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-blue-500 border-opacity-20 border-r border-t border-b rounded-r">
                                <div class="flex items-center">
                                    <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-blue-500 text-white rounded-br space-x-2">
                                    <span class="markup-h4 whitespace-nowrap overflow-ellipsis max-w-xs truncate">
                                        <span class="font-normal">{{ __('Branch') }}</span>
                                        B
                                    </span>
                                    </h2>
                                    <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($rightActions) }} {{ trans_choice('action|actions', count($rightActions)) }}</span>
                                    <button class="ml-auto -mr-8" type="button">
                                        <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                        <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div x-show="!collapsed">
                                    @foreach ($rightActions as $index => $action)
                                        @livewire($action['class']::getComponent() ?: 'automation-action', array_merge([
                                            'index' => $index,
                                            'uuid' => $action['uuid'],
                                            'action' => $action,
                                            'automation' => $automation,
                                            'editable' => false,
                                            'deletable' => false,
                                        ], ($action['data'] ?? [])), key('right' . $index . $action['uuid']))
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
</x-mailcoach::fieldset>

