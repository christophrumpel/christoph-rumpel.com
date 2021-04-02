<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="referrer" content="always">

        <link rel="preconnect" href="https://fonts.gstatic.com"> 

        <title>{{ isset($title) ? "{$title} |" : '' }} {{ isset($originTitle) ? "{$originTitle} |" : '' }} Mailcoach</title>

        <link rel="stylesheet" href="{{ asset('vendor/mailcoach/app.css') }}?t={{ app(\Spatie\Mailcoach\Domain\Shared\Support\Version::class)->getHashedFullVersion() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

        <meta name="turbolinks-cache-control" content="no-preview">

        {!! \Livewire\Livewire::styles() !!}
        <script type="text/javascript">
            window.__ = function (key) {
                return {
                    "Are you sure?": "{{ __('Are you sure?') }}",
                    "Type to add tags": "{{ __('Type to add tags') }}",
                    "No tags to choose from": "{{ __('No tags to choose from') }}",
                    "Press to add": "{{ __('Press to add') }}",
                    "Press to select": "{{ __('Press to select') }}",
                }[key];
            };
        </script>
        <script type="text/javascript" src="{{ asset('vendor/mailcoach/app.js') }}?t={{ app(\Spatie\Mailcoach\Domain\Shared\Support\Version::class)->getHashedFullVersion() }}" defer></script>

        @include('mailcoach::app.layouts.partials.endHead')
        @stack('endHead')
    </head>
    <body class="bg-gray-100">
        <script>/**/</script><!-- Empty script to prevent FOUC in Firefox -->

        <div class="mx-auto grid w-full max-w-layout min-h-screen p-6 z-auto"
         style="grid-template-rows: auto 1fr auto">
            <aside>
                @include('mailcoach::app.layouts.partials.startBody')
            </aside>


            <div>
                @include('mailcoach::app.layouts.partials.flash')

                <div class="h-full card card-split">
                    <nav class="card-nav">
                        {{ $nav ?? '' }}
                    </nav>

                    <main class="card-main">

                        <h1 class="markup-h1">
                            @isset($originTitle)
                                <div class="markup-h1-sub">
                                    @isset($originHref)
                                        <a class="text-blue-500" href="{{ $originHref }}">{{ $originTitle }}</a>
                                    @else
                                        {{ $originTitle }}
                                    @endif
                                </div>
                            @endif
                            {{ $title ?? '' }}
                        </h1>
                        {{ $slot }}
                    </main>
                </div>
            </div>

            <footer class="px-6 pt-6">
                @include('mailcoach::app.layouts.partials.footer')
            </footer>
        </div>

        <x-mailcoach::modal :title="__('Confirm')" name="confirm">
            <span data-confirm-modal-text>{{ __('Are you sure?') }}</span>

            <div class="form-buttons">
                <x-mailcoach::button type="button" data-modal-confirm :label=" __('Confirm')" />
                <x-mailcoach::button-cancel :label=" __('Cancel')" />
            </div>
        </x-mailcoach::modal>

        <x-mailcoach::modal :title="__('Confirm navigation')" name="dirty-warning">
            {{ __('There are unsaved changes. Are you sure you want to continue?') }}

            <div class="form-buttons">
                <x-mailcoach::button type="button" data-modal-confirm :label=" __('Confirm')" />
                <x-mailcoach::button-cancel :label=" __('Cancel')" />
            </div>
        </x-mailcoach::modal>

        @stack('modals')
        {!! \Livewire\Livewire::scripts() !!}
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    </body>
</html>
