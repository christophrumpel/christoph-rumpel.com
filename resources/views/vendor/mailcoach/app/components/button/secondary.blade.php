<button 
    {{ $attributes->merge(['type' => 'button', 'class' => 'button-secondary'])->except(['label']) }}
>
    {{ $label ?? __('Save')  }}
</button>