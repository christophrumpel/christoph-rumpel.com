<div x-data="{ tab: 'before' }"
     id="tab_wrapper" class="my-12 post-markdown-styles">
    <!-- The tabs navigation -->
    <nav class="flex flex-column items-center rounded-sm">
        <a :class="{ 'active bg-codeBackground text-highlightBlue': tab === 'before' || tab === 'before-with-comments' }"
           @click.prevent="tab = 'before'"
           href="#"
           class="block bg-gray-300 rounded-t px-4 py-4"
        >
            Before
        </a>
        <a :class="{ 'active bg-codeBackground text-highlightBlue': tab === 'after' || tab === 'after-with-comments'}"
           @click.prevent="tab = 'after'"
           href="#"
           class="block bg-gray-300 rounded-t ml-1 px-4 py-4"
        >After</a>
        <a :class="{ 'active bg-codeBackground text-highlightBlue': tab === 'both'}"
           @click.prevent="tab = 'both'"
           href="#"
           class="block bg-gray-300 rounded-t ml-1 px-4 py-4"
        >Both</a>
    </nav>


    <!-- The tabs content -->
    <div class="p-0 lg:p-4 border-b-8 border-highlightTurquoise bg-codeBackground">

        <div x-show="tab === 'before'"
             class="relative bg-codeBackground ">
            <x-code-tab-comment-btn
                btn-text="Show Comments"
                tabState="before-with-comments"
            ></x-code-tab-comment-btn>
            {!! $codeExampleBefore() !!}
        </div>
        <div x-show="tab === 'before-with-comments'" class="relative">
            <x-code-tab-comment-btn
                btn-text="Hide Comments"
                tabState="before"
            ></x-code-tab-comment-btn>
            {!! $codeExampleBeforeWithComments() !!}
        </div>
        <div x-show="tab === 'after'" class="relative">
            <x-code-tab-comment-btn
                btn-text="Show Comments"
                tabState="after-with-comments"
            ></x-code-tab-comment-btn>
            {!! $codeExampleAfter() !!}
        </div>
        <div x-show="tab === 'after-with-comments'" class="relative">
            <x-code-tab-comment-btn
                btn-text="Hide Comments"
                tabState="after"
            ></x-code-tab-comment-btn>
            {!! $codeExampleAfterWithComments() !!}
        </div>
        <div x-show="tab === 'both'" class="relative">
            Before

            {!! $codeExampleBefore() !!}

            {!! $codeExampleAfter() !!}
        </div>
    </div>


</div>

