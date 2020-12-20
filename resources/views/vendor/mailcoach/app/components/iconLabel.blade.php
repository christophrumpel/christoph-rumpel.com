@php
    use Illuminate\Support\Str;
@endphp

<span class="icon-label">
    @isset($count)
        <span class="flex">
            <span class="counter ml-0">{{ $count }} </span>
        </span>
    @else
        <i class="fas fa-fw {{ $icon ?? 'fa-arrow-right' }} {{ $caution ?? null ? 'text-red-500' : '' }}"></i>
    @endisset
    <span class="icon-label-text">
        {{ $text ?? '' }}
        {{ isset($count) && isset($countText) ? Str::plural($countText, $count) : ''}}
    </span>
</span>
