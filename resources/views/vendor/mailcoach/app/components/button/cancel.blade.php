
<button 
    {{ $attributes->merge(['type' => 'button', 'class' => 'button-cancel'])->except(['label']) }} 
    data-modal-dismiss
>
    {{ $label ?? __('Cancel')  }}
</button>