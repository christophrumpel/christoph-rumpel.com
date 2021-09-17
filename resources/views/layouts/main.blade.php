<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>{{ $title }}</title>
    <meta name="description"
          content="Hi, I am Christoph Rumpel and this is my personal blog where I share my Laravel, PHP and business experiences.">
    <meta name="author" content="Christoph Rumpel">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('partials.favicon')

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"/>
    @if($livewire)
        @livewireStyles
    @endif
    @include('partials.loadPageMeta')
    @include('partials.fontStyles')
    <!-- Styles -->

    <!-- Head Script -->
    @production
        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" site="DEPGUYJS" defer></script>
        <!-- Fathom -->

        @include('partials.schema')
    @endproduction


    <script defer src="{{ mix('js/app.js') }}"></script>

    <!-- Head Script -->

</head>

<body class="bg-bgBlue">

@include('partials.promoNotification')


<div class="container mx-auto  max-w-5xl p-8 md:p-12">
    <header class="flex flex-col lg:flex-row items-center mb-8 lg:mb-32">
        @include('partials.logo')
        @include('partials.nav')
    </header>

    {{ $slot }}
</div>

@include('partials.footer')
@if($livewire)
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
@endif
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
