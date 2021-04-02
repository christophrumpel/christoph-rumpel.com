<fieldset class="form-fieldset {{ $class ?? '' }} {{ (isset($focus) && $focus) ? 'form-fieldset-focus' : '' }}">
    @isset($legend)
        <div class="legend">
            {{ $legend }}
        </div>
    @endisset
    {{ $slot }}
</fieldset>