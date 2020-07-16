<x-main-layout>
    <main>

        <h1 class="page-h1">These are my posts with the cateogry <code class="page-code">{{ $category }}</code></h1>
        <ul class="post-list">
            @foreach($posts as $post)
                <li class="my-8 bg-white border-textBlue border-2">
                    <a class="block p-8"
                       href="{{$post->link()}}">
                        <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue">
                            {{ $post->title }}
                        </h2>
                    </a>
                </li>
            @endforeach
        </ul>
{{--        <ul>--}}
{{--            @foreach($posts as $post)--}}
{{--                <li class="my-4 p-8 border-textBlue border-t-2">--}}

{{--                    <h2 class="font-display text-3xl text-textBlue">--}}
{{--                        <a class="block"--}}
{{--                           href="{{$post->link()}}">{{ $post->title }}</a>--}}
{{--                    </h2>--}}

{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
    </main>
</x-main-layout>
