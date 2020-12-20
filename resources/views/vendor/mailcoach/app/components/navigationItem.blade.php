<li class="{{ \Illuminate\Support\Str::startsWith(request()->url(), $href) ? 'active' : ''  }}">
    <a href="{{ $href }}" @isset($dataDirtyWarn) data-dirty-warn @endisset>
        {{ $slot }}
    </a>
</li>
