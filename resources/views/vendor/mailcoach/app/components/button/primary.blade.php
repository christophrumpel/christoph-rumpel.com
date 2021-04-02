<button 
    {{ $attributes->merge(['type' => 'submit', 'class' => 'button'])->except(['label']) }}
>
    {{ $label ?? __('Save')  }}
</button>