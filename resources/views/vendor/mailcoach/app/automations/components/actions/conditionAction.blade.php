<x-mailcoach::fieldset :focus="$editing">
    <x-slot name="legend">
        <header class="flex items-center space-x-2">
            <span class="w-6 h-6 rounded-full inline-flex items-center justify-center text-xs leading-none font-semibold bg-yellow-200 text-yellow-700">
                {{ $index + 1 }}
            </span>
            <span class="font-normal whitespace-nowrap">
                Check for
                <span class="legend-accent">
                    {{ \Carbon\CarbonInterval::createFromDateString("{$length} {$unit}") }}
                </span>
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
                <div class="form-grid">
                    <div class="form-actions">
                        <div class="col-span-8 sm:col-span-4">
                            <x-mailcoach::text-field
                                :label="__('Duration')"
                                :required="true"
                                name="length"
                                wire:model="length"
                                type="number"
                            />
                        </div>
                        <div class="col-span-4 sm:col-span-4">
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

                        <div class="col-span-12 sm:col-span-4 sm:col-start-1">
                            <x-mailcoach::select-field
                                :label="__('Condition')"
                                :required="true"
                                name="condition"
                                wire:model="condition"
                                :placeholder="__('Select a condition')"
                                :options="$conditionOptions"
                            />
                        </div>

                        @switch ($condition)
                            @case (\Spatie\Mailcoach\Domain\Automation\Support\Conditions\HasTagCondition::class)
                                <div class="col-span-12 sm:col-span-4">
                                    <x-mailcoach::text-field
                                        :label="__('Tag')"
                                        name="conditionData.tag"
                                        wire:model="conditionData.tag"
                                    />
                                </div>
                            @break
                            @case (\Spatie\Mailcoach\Domain\Automation\Support\Conditions\HasOpenedAutomationMail::class)
                                <div class="col-span-12 sm:col-span-4">
                                    <x-mailcoach::select-field
                                        :label="__('Automation mail')"
                                        name="conditionData.automation_mail_id"
                                        wire:model="conditionData.automation_mail_id"
                                        :placeholder="__('Select a mail')"
                                        :options="
                                            \Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::query()
                                                ->where('track_opens', true)
                                                ->pluck('name', 'id')
                                        "
                                    />
                                </div>
                            @break
                            @case (\Spatie\Mailcoach\Domain\Automation\Support\Conditions\HasClickedAutomationMail::class)
                                <div class="col-span-12 sm:col-span-4">
                                    <x-mailcoach::select-field
                                        :label="__('Automation mail')"
                                        name="conditionData.automation_mail_id"
                                        wire:model="conditionData.automation_mail_id"
                                        :placeholder="__('Select a mail')"
                                        :required="true"
                                        :options="
                                            \Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::query()
                                                ->where('track_clicks', true)
                                                ->pluck('name', 'id')
                                        "
                                    />
                                </div>

                                @if ($conditionData['automation_mail_id'])
                                    <div class="col-span-12 sm:col-span-4">
                                        <x-mailcoach::select-field
                                            :label="__('Link')"
                                            name="conditionData.automation_mail_link_url"
                                            wire:model="conditionData.automation_mail_link_url"
                                            :placeholder="__('Select a link')"
                                            :required="false"
                                            :options="
                                                ['' => __('Any link')] +
                                                \Spatie\Mailcoach\Domain\Automation\Models\AutomationMail::find($conditionData['automation_mail_id'])
                                                    ->htmlLinks()
                                                    ->mapWithKeys(fn ($url) => [$url => $url])
                                                    ->toArray()
                                            "
                                        />
                                    </div>
                                @endif
                            @break
                        @endswitch
                    </div>
                </div>

                <div class="grid gap-6 w-full">
                    <section class="border-l-4 border-green-400 bg-white bg-opacity-50">
                        <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-green-500 border-opacity-20 border-r border-t border-b rounded-r">
                            <div class="flex items-center">
                                <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-green-400 text-white rounded-br space-x-2">
                                    <i class="far far fa-thumbs-up"></i>
                                    <span class="markup-h4">@lang('If')</span>
                                </h2>
                                <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($yesActions) }} {{ trans_choice('action|actions', count($yesActions)) }}</span>
                                <button class="ml-auto -mr-8" type="button">
                                    <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                    <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div x-show="!collapsed">
                                <livewire:automation-builder name="{{ $uuid }}-yes-actions" :automation="$automation" :actions="$yesActions" key="{{ $uuid }}-yes-actions" />
                            </div>
                        </div>
                    </section>
                    <section class="border-l-4 border-red-400 bg-white bg-opacity-50">
                        <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-red-500 border-opacity-20 border-r border-t border-b rounded-r">
                            <div class="flex items-center">
                                <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-red-400 text-white rounded-br space-x-2">
                                    <i class="far far fa-thumbs-down"></i>
                                    <span class="markup-h4">@lang('Else')</span>
                                </h2>
                                <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($noActions) }} {{ trans_choice('action|actions', count($noActions)) }}</span>
                                <button class="ml-auto -mr-8" type="button">
                                    <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                    <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                            <div x-show="!collapsed">
                                <livewire:automation-builder name="{{ $uuid }}-no-actions" :automation="$automation" :actions="$noActions" key="{{ $uuid}}-no-actions" />
                            </div>
                        </div>
                    </section>
                </div>
            @else
                <div class="grid gap-6 flex-grow">
                    <div class="grid gap-6 w-full">
                        <section class="border-l-4 border-green-400 bg-white bg-opacity-50">
                            <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 border-green-500 border-opacity-20 border-r border-t border-b rounded-r">
                                <div class="flex items-center">
                                    <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-green-400 text-white rounded-br space-x-2">
                                        <i class="far fa-thumbs-up"></i>
                                         @if ($condition)
                                            <span class="markup-h4 whitespace-nowrap overflow-ellipsis max-w-xs truncate">
                                                <span class="font-normal">@lang('If') {{ $condition::getName() }}</span>
                                                <span class="font-semibold tracking-normal normal-case">{{ $condition::getDescription($conditionData) }}</span>?
                                            </span>
                                        @endif
                                    </h2>
                                    <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($yesActions) }} {{ trans_choice('action|actions', count($yesActions)) }}</span>
                                    <button class="ml-auto -mr-8" type="button">
                                        <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                        <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div x-show="!collapsed">
                                    @foreach ($yesActions as $index => $action)
                                        @livewire($action['class']::getComponent() ?: 'automation-action', array_merge([
                                            'index' => $index,
                                            'uuid' => $action['uuid'],
                                            'action' => $action,
                                            'automation' => $automation,
                                            'editable' => false,
                                            'deletable' => false,
                                        ], ($action['data'] ?? [])), key('yes' . $index . $action['uuid']))
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <section class="border-l-4 border-red-400 bg-white bg-opacity-50">
                            <div x-data="{ collapsed: false }" :class="{ 'pb-8': !collapsed }" class="grid gap-4 px-12 pb-8 border-red-500 border-opacity-20 border-r border-t border-b rounded-r">
                                <div class="flex items-center">
                                    <h2 class="justify-self-start -ml-12 -mt-px -mb-px h-8 px-2 inline-flex items-center bg-red-400 text-white rounded-br space-x-2">
                                        <i class="far far fa-thumbs-down"></i>
                                        <span class="markup-h4">
                                            <span class="font-normal">@lang('Else')</span>
                                        </span>
                                    </h2>
                                    <span x-show="collapsed" class="text-gray-500 text-sm ml-4">{{ count($noActions) }} {{ trans_choice('action|actions', count($noActions)) }}</span>
                                    <button class="ml-auto -mr-8" type="button">
                                        <i x-show="!collapsed" @click="collapsed = true" class="fas fa-chevron-up"></i>
                                        <i x-show="collapsed" @click="collapsed = false" class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div x-show="!collapsed">
                                    @foreach ($noActions as $index => $action)
                                        @livewire($action['class']::getComponent() ?: 'automation-action', array_merge([
                                            'index' => $index,
                                            'uuid' => $action['uuid'],
                                            'action' => $action,
                                            'automation' => $automation,
                                            'editable' => false,
                                            'deletable' => false,
                                        ], ($action['data'] ?? [])), key('no' . $index . $action['uuid']))
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
</x-mailcoach::fieldset>

