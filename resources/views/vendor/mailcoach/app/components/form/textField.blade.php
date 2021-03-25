<div class="form-field">
    @if($label ?? null)
    <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
        {{ $label }}
    </label>
    @endif
    <input
        autocomplete="off"
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="input {{ $inputClass ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}"
        value="{{ old($name, $value ?? '') }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {!! $attributes ?? '' !!}
        @if($disabled ?? false) disabled @endif
    >
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
</div>
