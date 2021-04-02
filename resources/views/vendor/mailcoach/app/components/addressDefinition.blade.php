@if(count($addresses))
    <dt>
        {{ $label }}
    </dt>
    <dd>
        <ul>
        @foreach($addresses as $address)
            <li>
            {{ $address['email'] }}
            @if ($address['name'])
                <span class="text-gray-500">
                ({{ $address['name'] }})
                </span>
            @endif
            </li>
        @endforeach
        </ul>
    </dd>
@endif
