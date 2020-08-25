<div x-data="{ tab: 'before' }"
     id="tab_wrapper" class="my-12 post-markdown-styles">
    <!-- The tabs navigation -->
    <nav class="bg-highlightTurquoise flex flex-column items-center rounded-sm">
        <a :class="{ 'active bg-codeBackground rounded-t text-highlightBlue': tab === 'before' || tab === 'before-with-comments' }"
           @click.prevent="tab = 'before'"
           href="#"
           class="block px-4 py-4"
        >
            Before
        </a>
        <a :class="{ 'active bg-codeBackground rounded-t text-highlightBlue': tab === 'after' || tab === 'after-with-comments'}"
           @click.prevent="tab = 'after'"
           href="#"
           class="block px-4 py-4"
        >After</a>
    </nav>


    <!-- The tabs content -->
    <div x-show="tab === 'before'" class="relative bg-codeBackground rounded-b">
        <x-code-tab-comment-btn
            btn-text="Show Comments"
            tabState="before-with-comments"
        ></x-code-tab-comment-btn>
        <pre><code class="php">{{ $codeExampleBefore() }}</code></pre>
    </div>
    <div x-show="tab === 'before-with-comments'" class="relative">
        <x-code-tab-comment-btn
            btn-text="Hide Comments"
            tabState="before"
        ></x-code-tab-comment-btn>
        <pre><code class="php">{{ $codeExampleBeforeWithComments() }}</code></pre>
    </div>
    <div x-show="tab === 'after'" class="relative">
        <x-code-tab-comment-btn
            btn-text="Show Comments"
            tabState="after-with-comments"
        ></x-code-tab-comment-btn>
        <pre><code class="php">{{ $codeExampleAfter() }}</code></pre>
    </div>
    <div x-show="tab === 'after-with-comments'" class="relative">
        <x-code-tab-comment-btn
            btn-text="Hide Comments"
            tabState="after"
        ></x-code-tab-comment-btn>
        <pre><code class="php">{{ $codeExampleAfterWithComments() }}</code></pre>
    </div>

</div>

