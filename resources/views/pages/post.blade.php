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


            <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'description' }"
                 id="tab_wrapper" class="my-12 post-markdown-styles">
                <!-- The tabs navigation -->
                <nav class="bg-highlightTurquoise flex flex-column items-center rounded-sm">
                    <a :class="{ 'active bg-codeBackground rounded-t text-highlightBlue': tab === 'before' }"
                       @click.prevent="tab = 'before'; window.location.hash = 'before'"
                       href="#"
                       class="block px-4 py-4"
                    >
                        Before
                    </a>
                    <a :class="{ 'active bg-codeBackground rounded-t text-highlightBlue': tab === 'after' }"
                       @click.prevent="tab = 'after'; window.location.hash = 'after'"
                       href="#"
                       class="block px-4 py-4"
                    >After</a>
                    <a :class="{ 'active bg-codeBackground rounded-t text-highlightBlue': tab === 'both' }"
                       @click.prevent="tab = 'both'; window.location.hash = 'both'"
                       href="#"
                       class="block px-4 py-4"
                    >Both</a>
                </nav>


                <!-- The tabs content -->
                <div x-show="tab === 'before'" class="">
                    <pre><code class="php">
public function calculateScore(User $user): int
{
    if ($user->inactive) {
        $score = 0;
    } else {
        if ($user->hasBonus) {
            $score = $user->score + $this->bonus;
        } else {
            $score = $user->score;
        }
    }

    return $score;
}
                        </code></pre>
                </div>
                <div x-show="tab === 'after'">
                   <pre><code class="php">
public function calculateScore(User $user): int
{
    if ($user->inactive) {
        return 0;
    }

    if ($user->hasBonus) {
        return $user->score + $this->bonus;
    }

    return $user->score;
}
                        </code></pre>
                </div>
                <div x-show="tab === 'both'">
                   <pre><code class="php">
public function calculateScore(User $user): int
{
    if ($user->inactive) {
        $score = 0;
    } else {
        if ($user->hasBonus) {
            $score = $user->score + $this->bonus;
        } else {
            $score = $user->score;
        }
    }

    return $score;
}

public function calculateScore(User $user): int
{
    if ($user->inactive) {
        return 0;
    }

    if ($user->hasBonus) {
        return $user->score + $this->bonus;
    }

    return $user->score;
}
                        </code></pre>
                </div>
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
