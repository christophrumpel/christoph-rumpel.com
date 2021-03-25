<div class="my-2 flex flex-wrap items-center justify-center text-gray-600 text-xs">
    <a class="link-dimmed inline-block truncate" style="max-width: 12rem" href="https://mailcoach.app">
        Mailcoach {{ $versionInfo->getCurrentVersion() }}
    </a>
    <span>&nbsp;{{ __('by') }} <a class="link-dimmed" href="https://spatie.be">SPATIE</a></span>

    @if(Auth::check())
        <span class="mx-2">•</span>
        <a class="link-dimmed" href="https://spatie.be/docs/laravel-mailcoach" target="_blank">{{ __('Documentation') }}</a>
        
        <span class="mx-2">•</span>
        <a class="link-dimmed inline-block truncate" style="max-width: 12rem" href="{{ route('debug') }}">
            Debug
        </a>
        
        @if(! $versionInfo->isLatest())
            <a class="ml-4 inline-flex items-center bg-gray-400 bg-opacity-25 text-gray-600 rounded-sm px-2 leading-loose" href="/">
                <i class="fas fa-horse-head opacity-75 mr-1"></i>
                {{ __('Upgrade available') }}
            </a>
        @endif
    @endif


    @if (! app()->environment('production') || config('app.debug'))
        <span class="ml-4 inline-flex items-center bg-gray-400 bg-opacity-25 text-red-600 rounded-sm px-2 leading-loose">
            <i class="fas fa-wrench opacity-75 mr-1"></i>
            Env: {{ app()->environment() }} &mdash; Debug: {{ config('app.debug') ? 'true' : 'false' }}
        </span>
    @endif
</div>
