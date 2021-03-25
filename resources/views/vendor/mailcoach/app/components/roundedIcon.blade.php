@php
    $typeCss = [
        'success' => 'bg-green-400',
        'warning' => 'bg-orange-400',
        'error' => 'bg-red-500',
        'info' => 'bg-blue-400',
        'neutral' => 'bg-gray-400',
    ];

    if(!isset($type) || !array_key_exists($type, $typeCss)){
        $type = 'neutral';
    }

@endphp

<span class="
    w-4 h-4 rounded-full 
    inline-flex items-center justify-center 
    shadow-sm 
    leading-none
    {{ $typeCss[$type] }}
    {{ $class ?? '' }}
">
    <i style="font-size: 8px" class="text-white fa-fw {{ $icon ?? 'fas fa-info' }} "></i>
</span>