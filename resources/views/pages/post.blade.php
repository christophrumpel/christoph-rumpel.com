<x-main-layout :post="$post" :title="$post->title" page="post">
    <main class="mt-16">

        <article class="post">
            <time class="text-textBlue font-bold"
                  datetime="{{ $post->date->format('Y-m-d') }}">{{ $post->date->format('F Y') }}</time>
            <h1 class="font-display font-bold text-3xl lg:text-5xl mb-8 text-textBlue"><span
                    class="title-highlight-underline">{{$post->title}}</span></h1>

            @foreach($post->categories as $category)
                <a href="{{ route('page.category', $category) }}"
                   class="border-black border-2 rounded p-2 uppercase text-link">#{{$category}}</a>
            @endforeach

            @if($post->old)
                @include('partials.blogOldNote')
            @endif

            @if($post->summary)
            <p class="text-xl lg:text-2xl p-4 lg:p-8 my-8 mb-16 italic rounded-lg bg-blue-100 border-b-2 border-highlightBlue">
                {!! $post->summary !!}
            </p>
            @endif
            <div class="post-markdown-styles">
                @if($post->slug === 'refactoring-php')
                    @include('refactoringPhpPost')
                @else
                    {!! $post->content !!}
                @endif


            </div>
        </article>

        @include('partials.newsletter')
    </main>
</x-main-layout>
