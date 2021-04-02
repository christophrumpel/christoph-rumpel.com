<li class="{{ \Illuminate\Support\Str::startsWith($href, request()->url()) ? 'active' : ''  }}">
    <a href="{{ $href }}" @isset($dataDirtyWarn) data-dirty-warn @endisset>
        {{ $slot }}
    </a>
</li>
