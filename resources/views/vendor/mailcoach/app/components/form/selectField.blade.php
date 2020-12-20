<div class="form-row">
    @isset($label)
    <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
        {{ $label }}
    </label>
    @endisset
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
    <div class="select">
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            {{ ($required ?? false) ? 'required' : '' }}
            @isset($dataConditional) data-conditional="{{ $dataConditional }}" @endisset
        >
            @foreach($options as $optionValue => $label)
                <option value="{{ $optionValue }}" @if(old($name, $value ?? null) == $optionValue) selected @endif>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        <div class="select-arrow">
            <i class="fas fa-angle-down"></i>
        </div>
    </div>
</div>
