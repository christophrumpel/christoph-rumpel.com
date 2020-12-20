<div class="form-row">
    @if($label ?? null)
    <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
        {{ $label }}
    </label>
    @endif
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
    <input
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        class="input max-w-xs"
        value="{{ old($name, $value ?? '') }}"
        data-datepicker="true"
        placeholder="{{ $placeholder ?? '' }}"
        {{ ($required ?? false) ? 'required' : '' }}
    >
</div>
