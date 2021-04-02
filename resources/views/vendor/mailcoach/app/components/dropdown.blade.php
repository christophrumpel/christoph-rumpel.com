<div class="dropdown" data-dropdown>
    <button type="button" class="{{ $triggerClass ?? 'opacity-75 hover:opacity-100' }} @if(! isset($trigger)) px-2 @endif" data-dropdown-trigger>
        @if(isset($trigger))
            {{ $trigger }}
        @else
            <i class="fas fa-ellipsis-v | dropdown-trigger-rotate"></i>
        @endif
    </button>
    <div class="dropdown-list {{ isset($direction) ? 'dropdown-list-' . $direction : '' }} | hidden" data-dropdown-list>
        {{ $slot }}
    </div>
</div>
