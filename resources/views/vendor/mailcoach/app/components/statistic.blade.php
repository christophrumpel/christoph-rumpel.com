<div class="{{ $class ?? '' }}">
    <div class="{{ $numClass ?? 'text-2xl font-semibold' }}">
        {{ $prefix ?? '' }}
        {{ $stat ?? 0 }}
        <span class="font-normal text-gray-400 text-sm">{{ $suffix ?? ''}}</span>
    </div>
    <div class="text-sm">
        @if($href ?? null)
            <a class="link-dimmed text-gray-800" href="{{$href}}">{{ $label }}</a>
        @else
            {{ $label }}
        @endif
    </div>
</div>
