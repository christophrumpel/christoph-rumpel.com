<div class="form-row">
    @isset($label)
        <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
            {{ $label }}
        </label>
    @endisset
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
    <select
        name="{{ $name }}[]"
        id="{{ $name }}"
        {{ ($required ?? false) ? 'required' : '' }}
        multiple
        data-tags="{{ json_encode($tags) }}"
        data-tags-selected="{{ json_encode(old($name, $value ?? [])) }}"
        @isset($allowCreate) data-tags-allow-create @endisset
    ></select>
</div>
