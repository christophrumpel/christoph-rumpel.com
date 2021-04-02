    <div class="px-8 py-6 lg:py-8">
        <div class="flex items-center justify-between">
            <div>
                @isset($backHref)
                    <a href="{{ $backHref }}" class="text-blue-100 text-sm font-semibold hover:text-white">
                        <span class="icon-label">
                            <i class="text-blue-500 fas fa-angle-left"></i>
                            <span class="icon-label-text">
                                {{ $backLabel ?? '' }}
                            </span>
                        </span>
                    </a>
                @endisset    
            </div>
            
            <a class="pl-3" href="{{ route('mailcoach.home') }}" data-navigation-trigger>
                <span 
                class="group w-10 h-10 flex items-center justify-center bg-gradient-to-b from-blue-500 to-blue-600 text-white rounded-full">
                    <span class="flex items-center justify-center w-6 h-6 transform group-hover:scale-90 transition-transform duration-150">
                        @include('mailcoach::app.layouts.partials.logoSvg')
                    </span>
                </span>
            </a>
        </div>
    </div>

<div data-navigation class="navigation {{ isset($backHref) ? 'navigation-sub' : '' }}">
    @isset($title)   
        @php
            $maxLength = 24;
            $partLength = floor(($maxLength - 1)/2);
            $titleTruncated = strlen($title) > $maxLength ? 
                substr($title, 0, $partLength ) . '…' . substr($title, -$partLength )
                : $title;
        @endphp
        <h2 class="
            col-span-2 sm:col-span-4 lg:col-span-1
            -mx-2 px-2 py-4 border-b border-black border-opacity-10 uppercase tracking-wider lg:text-right text-xs text-blue-500 font-semibold whitespace-nowrap">
            <span class="hidden lg:block">{{ $titleTruncated }}</span>
            <span class="lg:hidden block">{{ $title }}</span>
        </h2>
        
    @endisset

    {{ $slot }}
</div>