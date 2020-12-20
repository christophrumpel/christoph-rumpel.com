<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? "{$title} | Mailcoach" : 'Mailcoach' }}</title>

        <link rel="stylesheet" href="{{ asset('vendor/mailcoach/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    </head>
    <body class="bg-blue-100">
        <div class="min-h-screen flex flex-col p-6">
            <div class="flex-grow flex items-center justify-center">
                <div class="w-full max-w-xl">
                    <div class="card shadow-2xl border-l-8 border-blue-500">
                        <div class="text-lg md:text-xl lg:text-2xl">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-8 text-gray-400 text-xs text-center">
                {{ __('Powered by') }}
                <a class="link-dimmed inline-flex items-center" href="https://mailcoach.app">
                    Mailcoach
                    <span class="h-5 ml-1">
                        @include('mailcoach::app.layouts.partials.logoSvg')
                    </span>
                </a>
            </div>
        </div>

    </body>
</html>
