<x-main-layout :post="$post" :title="$post->title" page="post">
    <main class="mt-16">

        <article class="post">
            <time class="text-textBlue font-bold"
                  datetime="{{ $post->date->format('Y-m-d') }}">{{ $post->date->format('F Y') }}</time>
            <h1 class="font-display font-bold text-3xl lg:text-5xl mb-8 text-textBlue"><span
                    class="title-highlight-underline">{{$post->title}}</span></h1>


            <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
            <script>hljs.initHighlightingOnLoad();</script>

            <div class="post-markdown-styles">
                <h2>Early Returns</h2>

                <p>The concept of <code>early returns</code> refers to a practice where we try to void nesting by
                    breaking a structure down to specific actions. In return we will get a more linear code which is
                    much easier to grasp. Every case is separated and good to read by itself. Don't be afraid of using
                    multiple return statements.</p>

                <h3>Example #1</h3>
                <x-code-tab
                    codeBefore="early-return-example-1-before"
                    codeBeforeWithComments="early-return-example-1-before-with-comments"
                    codeAfter="early-return-example-1-after"
                    codeAfterWithComments="early-return-example-1-after-with-comments"
                ></x-code-tab>

                <h3>Example #2</h3>
                <x-code-tab
                    codeBefore="early-return-example-2-before"
                    codeBeforeWithComments="early-return-example-2-before-with-comments"
                    codeAfter="early-return-example-2-after"
                    codeAfterWithComments="early-return-example-2-after-with-comments"
                ></x-code-tab>
            </div>


            @foreach($post->categories as $category)
                <a href="{{ route('page.category', $category) }}"
                   class="border-black border-2 rounded p-2 uppercase text-link">#{{$category}}</a>
            @endforeach

            @if($post->old)
                @include('partials.blogOldNote')
            @endif

            <p class="text-xl lg:text-2xl my-6 ">
                {!! $post->summary !!}
            </p>
            <div class="post-markdown-styles">
                {!! $post->content !!}
            </div>
        </article>

        @include('partials.newsletter')
    </main>
</x-main-layout>
