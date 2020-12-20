<div class="form-row max-w-full">
    @if($label ?? null)
        <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
            {{ $label }}
        </label>
    @endif
    @error($name)
    <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
    <textarea
        class="input input-html"
        {{ ($required ?? false) ? 'required' : '' }}
        rows="20"
        id="{{ $name }}"
        name="{{ $name }}"
        data-html-preview-source
    >{{ old($name, $value ?? '') }}</textarea>
</div>
