<div class="relative mr-12">
    <svg class="w-full" style="height: 200px" viewBox="0 0 29 100" preserveAspectRatio="none">
        <defs>
            <linearGradient id="blueGradient" x1="0" x2="0" y1="0" y2="1">
                <stop offset="0%" stop-color="#c9dff2ff" />
                <stop offset="100%" stop-color="#c9dff200" />
            </linearGradient>
            <linearGradient id="redGradient" x1="0" x2="0" y1="0" y2="1">
                <stop offset="0%" stop-color="#CC687588" />
                <stop offset="100%" stop-color="#CC687500" />
            </linearGradient>
        </defs>
        <path
            d="M 1,0 L 1,100
               M 2,0 L 2,100
               M 3,0 L 3,100
               M 4,0 L 4,100
               M 5,0 L 5,100
               M 6,0 L 6,100
               M 7,0 L 7,100
               M 8,0 L 8,100
               M 9,0 L 9,100
               M 10,0 L 10,100
               M 11,0 L 11,100
               M 12,0 L 12,100
               M 13,0 L 13,100
               M 14,0 L 14,100
               M 15,0 L 15,100
               M 16,0 L 16,100
               M 17,0 L 17,100
               M 18,0 L 18,100
               M 19,0 L 19,100
               M 20,0 L 20,100
               M 21,0 L 21,100
               M 22,0 L 22,100
               M 23,0 L 23,100
               M 24,0 L 24,100
               M 25,0 L 25,100
               M 26,0 L 26,100
               M 27,0 L 27,100
               M 28,0 L 28,100
               M 29,0 L 29,100
               M 30,0 L 30,100
            "
            stroke="#e8eff6"
            stroke-width="1px"
            fill="none"
            vector-effect="non-scaling-stroke"
        />
        <path
            d="M 0,100 {{ $subscribersPath }}"
            style="d: path('M 0,100 {{ $subscribersPath }}'); transition: all .5s ease-out"
            stroke="#97c6f3"
            stroke-width="2px"
            fill="url(#blueGradient)"
            vector-effect="non-scaling-stroke"
        />
        <path
            d="M 0,0 L 0,100 L 29,100 L 29,0"
            stroke="#e8eff6"
            stroke-width="4px"
            fill="none"
            vector-effect="non-scaling-stroke"
        />
    </svg>

    @foreach($stats as $index => $stat)
        <div class="chart-tooltip-container" style="left: {{ $index / 29 * 100 }}%">
            <label class="chart-tooltip">
                <span class="chart-tooltip-legend | bg-blue-400"></span>
                {{ number_format($stat['subscribers']) }} {{ __('subscribers') }}
                <br>
                <span class="chart-tooltip-legend | bg-red-400"></span>
                {{ $stat['unsubscribes'] }} {{ __('unsubscribes') }}
            </label>
        </div>
    @endforeach

    <div class="chart-label-y text-blue-400 | top-0">
        {{ Illuminate\Support\Str::shortNumber($subscribersLimit) }}
    </div>
    <div class="chart-label-y | bottom-0 mb-6">0</div>

    <ol class="flex text-xs text-gray-400 mt-2 -mx-5" style="width: calc(100% + 2.5rem)">
        @foreach($stats as $index => $stat)
            <li class="flex-1 text-center">
                @if($index % 4 === 0)
                    <span class="whitespace-nowrap">{{ $stat['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</div>
