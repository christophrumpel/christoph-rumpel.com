<div class="flex flex-wrap items-center justify-center pt-8 text-gray-400 text-xs">
    <a class="link-dimmed" href="https://mailcoach.app/docs" target="_blank">{{ __('Documentation') }}</a>
    <span class="mx-2">•</span>
    <a class="link-dimmed inline-block truncate" style="max-width: 12rem" href="https://mailcoach.app">
        Mailcoach {{ $versionInfo->getCurrentVersion() }}
    </a>
    <span>&nbsp;{{ __('by') }} <a class="link-dimmed" href="https://spatie.be">SPATIE</a></span>
    <span class="mx-2">•</span>
    <a class="link-dimmed inline-block truncate" style="max-width: 12rem" href="{{ route('debug') }}">
        Debug
    </a>

    @if(! $versionInfo->isLatest())
        <a class="ml-4 my-2 inline-flex items-center bg-green-200 text-green-800 rounded-sm px-2 leading-loose" href="/">
            <i class="fas fa-horse-head opacity-50 mr-1"></i>
            {{ __('Upgrade available') }}
        </a>
    @endif

    @if (! app()->environment('production') || config('app.debug'))
        <span class="ml-4 my-2 inline-flex items-center bg-red-200 text-red-800 rounded-sm px-2 leading-loose">
            <i class="fas fa-wrench opacity-50 mr-1"></i>
            Env: {{ app()->environment() }} &mdash; Debug: {{ config('app.debug') ? 'true' : 'false' }}
        </span>
    @endif
</div>
