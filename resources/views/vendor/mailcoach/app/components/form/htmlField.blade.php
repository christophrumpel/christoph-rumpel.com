<div class="form-field max-w-full">
    @if($label ?? null)
        <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
            {{ $label }}
        </label>
    @endif
    <textarea
        class="input input-html"
        {{ ($required ?? false) ? 'required' : '' }}
        rows="20"
        id="{{ $name }}"
        name="{{ $name }}"
        data-html-preview-source
        @if($disabled ?? false) disabled @endif
    >{{ old($name, $value ?? '') }}</textarea>
    @error($name)
    <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
</div>
