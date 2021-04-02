<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.gstatic.com"> 

        <title>{{ isset($title) ? "{$title} | Mailcoach" : 'Mailcoach' }}</title>

        <link rel="stylesheet" href="{{ asset('vendor/mailcoach/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.0/css/all.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
    <img style="mix-blend-mode: multiply;" class="fixed w-full bottom-0 opacity-10" src="{{ asset('vendor/mailcoach/images/auth-footer.jpg') }}">

    <div id="app">
        <div class="min-h-screen flex flex-col">
            <div class="flex-grow flex items-center justify-center mx-12 my-4">
                @include('mailcoach::app.layouts.partials.flash')
                <div class="w-full max-w-md">
                    <div class="flex justify-center -mb-4 z-10">
                        <a href="/" class="group w-16 h-16 flex items-center justify-center bg-gradient-to-b from-blue-500 to-blue-600 text-white rounded-full shadow-lg">
                            <span class="w-10 h-10 transform group-hover:scale-90 transition-transform duration-150">
                                @include('mailcoach::app.layouts.partials.logoSvg')
                            </span>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-main text-xl">
                            @yield('landing')
                        </div>
                    </div>
                </div>
            </div>
            @include('mailcoach::app.layouts.partials.footer')
        </div>
    </div>

</body>
</html>
