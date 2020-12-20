@component('mailcoach::mails.layout.layout')
    {{-- Header --}}
    @slot('header')
        @component('mailcoach::mails.layout.header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mailcoach::mails.layout.subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mailcoach::mails.layout.footer')
            {{ __('Powered by') }}
            <a href="https://mailcoach.app">
                Mailcoach<img style="mso-hide:all;" class="mailcoach-logo" src="data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAABhQTFRFjYyKu7q5pKOi2trZenl28/Pya2pn////c6o7aAAAAAh0Uk5T/////////wDeg71ZAAAC5ElEQVR42uyY7XLjMAhF+XTe/43Xji0LIcBK253Znan+JRVHCNCFFF4/vOAX+J8BlRkRCe5F+0dm/Rh4cABkyxfAQX4GKu/+VCC3ZPfZcTuQCbYvrh0bAHH7xoLIw+8AcRkocMT/Wke+ZRn48mHJCkTPIhi2cwE8SEslvJcEkhTA80z57GFcXrxy4PYVoIRAOv/Y4la9MG1XVF81FohDOHiTNJQsfdcZ92eg7gEQjHm4ZwLUAjEEDn8870/BtZWMU7gK1KscYCIq2Dygr5pBbWw8Lj+GvVf47EkukSEQnFiQ5ZH7ci41C4SxBBqxX7tdt++R6THMwG2Ss1Y/3IWBwkt5IFkgT2IyCCbZuqYEaFN2eYOX16QtS4LSz5jLMANePLrdlpZdvs/qQE6A/TyVfhW2kvqu9L4PF4E65PvO7f0Wbw5OZTgAW4gbT10sgMcvhGlWPJjF7VJ3MecyuIeNNrCQAm20RvFSctJDYQ/1QMh4B9J9pqjleWC2KVy0ADSvDbXGMUnQQ3PgjqQCiRA3ZQ90w0OGRDc9vFaBMZL9MCI5UKeJbupTOu0ALCdYRXIGnEX5qMB5aglGYh1Dbu7NMHqvy0O7UuTkkAzip6H9dgyOk3WwRn/I2+vRwgHH2xy6MgBAbTbeOjRbGKBSVDDWRGSMQGzRgBrM/28vMBiAz9tmFm+ghnOzhIZnggoLiE/rJ2LwXWUBVoeE+tR8t1v71Mgr12wB/QHPAwK7z+iefGQBt0zTrJ2u7aET9tACtBqy1BJxbI6JBWCkQa1dodEYdAKRWLRfRH6udP1M7Y+v0gK2+OeO5D9aagsI4jGNdhEws4Cka2IK1NribwF//Mo/mJS1sgkmoKxslgo7ClZW2CtPL8xK9vQWxCG5cyIOz/I1DyO1fD0JbDkaRgL70ALCKNYtoGo5GbFsUlVT/MTH3kaLtp0Ty0afDxbVlF2NIq9s9Km9rIaltmeRlVv8/h/7HwT+EWAABQibF6/5L0sAAAAASUVORK5CYII=">
            </a>
        @endcomponent
    @endslot
@endcomponent
