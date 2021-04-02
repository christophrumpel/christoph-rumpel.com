
<div class="navigation-group {{ $class ?? '' }}">
    @isset($title)
        @php
            $maxLength = 22;
            $partLength = floor(($maxLength - 1)/2);
            $titleTruncated = strlen($title) > $maxLength ? 
                substr($title, 0, $partLength ) . '…' . substr($title, -$partLength )
                : $title;
        @endphp
        <div class="flex lg:justify-end">
            <h3 class="truncate">
                <span class="icon-label">
                    @isset($icon)
                    <span class="ml-2 lg:ml-0">
                        <i class="fa-fw {{ $icon }}"></i>
                    </span>
                    @endisset
                    <span class="icon-label-text">
                        {{ $titleTruncated ?? '' }}
                    </span>
                </span>
            </h3>
        </div>
    @endisset
    <ul>
        {{ $slot }}
    </ul>
</div>