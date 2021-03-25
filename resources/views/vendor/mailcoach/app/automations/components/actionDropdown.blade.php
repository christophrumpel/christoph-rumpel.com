<div class="flex my-6">
    <div class="-ml-6 pl-6 w-64 flex">
        <hr class="absolute left-0 w-full h-0 top-1/2 transform -translate-y-1/2 border-t border-dashed border-gray-500 border-opacity-25">
    <x-mailcoach::dropdown direction="right">
        <x-slot name="trigger">
            <div class="group button-rounded" title="{{__('Insert action')}}">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-2 h-px bg-gray-600 group-hover:bg-yellow-700"></span>
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-px h-2 bg-gray-600 group-hover:bg-yellow-700"></span>
            </div>
        </x-slot>

        <div style="min-width:40rem" class="max-w-full px-1 py-4 grid items-start gap-8 grid-cols-2">
            @foreach ($actionOptions as $category => $actions)
            <div>
                <h4 class="mb-2 px-6 markup-h4 text-yellow-700">
                    <i class="fa-fw fas {{ \Spatie\Mailcoach\Domain\Automation\Support\Actions\Enums\ActionCategoryEnum::icons()[$category] }}"></i>
                    {{ \Spatie\Mailcoach\Domain\Automation\Support\Actions\Enums\ActionCategoryEnum::make($category)->label }}
                </h4>
                <ul>
                    @foreach ($actions as $action)
                        <li>
                            <a href="#" wire:click.prevent="addAction('{{ addslashes($action) }}', {{ $index }})">
                                <span class="icon-label">
                                    {{ $action::getName() }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </x-mailcoach::dropdown>
    </div>
</div>
