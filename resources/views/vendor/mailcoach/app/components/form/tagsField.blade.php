<div class="form-field">
    @isset($label)
        <label class="{{ ($required ?? false) ? 'label label-required' : 'label' }}" for="{{ $name }}">
            {{ $label }}
        </label>
    @endisset
    <select
        name="{{ $name }}[]"
        id="{{ $name }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {{ ($multiple ?? true) ? 'multiple' : '' }}
        data-tags="{{ json_encode($tags) }}"
        data-tags-selected="{{ json_encode(old($name, $value ?? [])) }}"
        @isset($allowCreate) data-tags-allow-create @endisset
        {!! $attributes->except(['value', 'tags', 'required', 'multiple', 'name', 'allowCreate']) ?? '' !!}
    ></select>
    @error($name)
        <p class="form-error" role="alert">{{ $message }}</p>
    @enderror
</div>
