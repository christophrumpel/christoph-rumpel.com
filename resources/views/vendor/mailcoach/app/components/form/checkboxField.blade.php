<label class="checkbox-label" for="{{ $name }}">
    <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $name }}"
    value="1"
    class="checkbox"
    @isset($dataConditional) data-conditional="{{ $dataConditional }}" @endisset
    @if(old($name, $checked)) checked @endif
    @if($disabled ?? false) disabled @endif
    >
    <span>{{ $label }}</span>
</label>
@error($name)
    <p class="form-error" role="alert">{{ $message }}</p>
@enderror

