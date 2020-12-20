<th {{ $attributes }}>
    @if($sortable)
        <a href="{{ $href }}" data-turbolinks-action="replace" data-turbolinks-preserve-scroll>
            {{ $slot }}
            @if($isSortedAsc)
                <i class="fa fa-arrow-up text-gray-300"></i>
            @elseif($isSortedDesc)
                <i class="fa fa-arrow-down text-gray-300"></i>
            @endif
        </a>
    @else
        {{ $slot }}
    @endisset
</th>
