<th {{ $attributes }}>
    @if($sortable)
        <a href="{{ $href }}" data-turbolinks-action="replace" data-turbolinks-preserve-scroll>
            {{ $slot }}
            @if($isSortedAsc())
                <i class="fas fa-arrow-up text-gray-400"></i>
            @elseif($isSortedDesc())
                <i class="fas fa-arrow-down text-gray-400"></i>
            @endif
        </a>
    @else
        {{ $slot }}
    @endisset
</th>
