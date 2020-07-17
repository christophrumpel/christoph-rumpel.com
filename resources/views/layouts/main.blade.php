<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{ $title }}</title>
    <meta name="description"
          content="Hi, I am Christoph Rumpel and this is my personal blog where I share my Laravel, PHP anb business experiences.">
    <meta name="author" content="Christoph Rumpel">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@include('partials.favicon')

<!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"/>
{{--    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,700;1,400&display=swap"--}}
{{--          rel="stylesheet">--}}
    @livewireStyles

@if($page === 'home')
    @include('partials.metaHome')
@elseif($page === 'post')
    @include('partials.metaPost')
@elseif($page === 'speaking')
    @include('partials.metaSpeaking')
@elseif($page === 'uses')
    @include('partials.metaUses')
@endif

    @production
    <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" site="DEPGUYJS" defer></script>
        <!-- / Fathom -->
    @endproduction

    <script defer src="{{ mix('js/app.js') }}"></script>

    <style>
        /* latin-ext */
        @font-face {
            font-family: 'Bitter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Bitter Regular'), local('Bitter-Regular'), url(https://fonts.gstatic.com/s/bitter/v15/rax8HiqOu8IVPmn7cYxpLjpSm3LZ.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Bitter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: local('Bitter Regular'), local('Bitter-Regular'), url(https://fonts.gstatic.com/s/bitter/v15/rax8HiqOu8IVPmn7f4xpLjpSmw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Bitter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local('Bitter Bold'), local('Bitter-Bold'), url(https://fonts.gstatic.com/s/bitter/v15/rax_HiqOu8IVPmnzxKl8DRhfsUjQ8Qad.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Bitter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: local('Bitter Bold'), local('Bitter-Bold'), url(https://fonts.gstatic.com/s/bitter/v15/rax_HiqOu8IVPmnzxKl8AxhfsUjQ8Q.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>

</head>

<body class="bg-bgBlue">
<div class="container mx-auto  max-w-5xl p-8 md:p-12">
    <header class="flex flex-col lg:flex-row items-center mb-8 lg:mb-32">
        @include('partials.logo')
        @include('partials.nav')
    </header>

    {{ $slot }}
</div>

@include('partials.footer')

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
