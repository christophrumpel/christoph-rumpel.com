<button
    @click.prevent="tab = '{{ $tabState }}'"
    class="flex flex-column text-bgBlue absolute right-0 text-sm block px-4 py-4 underline uppercase"
>
    <x-far-lightbulb class="h-5 w-5 mr-2 text-highlightYellow" /> {{ $btnText }}
</button>
