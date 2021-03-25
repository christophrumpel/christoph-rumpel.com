@php
    $id = $name . '-' . $optionValue;
    $checked = old($name, $value ?? null) == $optionValue;
@endphp

<label class="radio-label" for="{{ $id }}">
    <input
        type="radio"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $optionValue }}"
        class="radio"
        @if($checked) checked @endif
        @isset($dataConditional) data-conditional="{{ $dataConditional }}" @endisset
        @if($disabled ?? false) disabled="disabled" @endif
        @if($readOnly ?? false) readonly="readonly" @endif
    >
    <span>{{ $label }}</span>
</label>
