@php
    use Illuminate\Support\Str;
    $invers = $invers ?? false;
@endphp

<span class="icon-label">
    @if(!$invers)
        @isset($count)
            <span class="flex">
                <span class="counter ml-0">{{ $count }} </span>
            </span>
        @else
            <span class="w-5 flex justify-center">
                <i class="{{ $icon ?? 'far fa-arrow-right' }} {{ $caution ?? null ? 'text-red-500' : '' }}"></i>
            </span>
        @endisset
    @endif

    <span class="icon-label-text">
        {{ $text ?? '' }}
        {{ isset($count) && isset($countText) ? Str::plural($countText, $count) : ''}}
    </span>

    @if($invers)
        @isset($count)
            <span class="flex">
                <span class="counter ml-2">{{ $count }} </span>
            </span>
        @else
            <i class="{{ $icon ?? 'far fa-arrow-right' }} {{ $caution ?? null ? 'text-red-500' : '' }}"></i>
        @endisset
    @endif
</span>
