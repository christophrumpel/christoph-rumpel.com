<div x-data="{ showPromoBanner: $persist(true)}">
    <div class="relative bg-highlightBlue"
         x-show="showPromoBanner"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform"
         x-transition:enter-end="opacity-100 transform"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform"
         x-transition:leave-end="opacity-0 transform">
        <div class="max-w-screen-xl mx-auto py-6 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-textBlue">
        <span class="md:hidden">
         Interested how Laravel works under the hood?
        </span>
                    <span class="hidden md:inline">
         Interested how Laravel works under the hood?
        </span>
                    <span class="block sm:ml-2 sm:inline-block">
          <a href="https://laravelcoreadventures.com" class="text-textBlue font-bold underline">
            &rarr; Check my Laravel Core Adventures Course
          </a>
        </span>
                </p>
            </div>
            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                <button @click="showPromoBanner = false" type="button"
                        class="flex p-2 text-textBlue hover:text-white rounded-md hover:bg-textBlue focus:outline-none focus:bg-textBlue transition ease-in-out duration-150"
                        aria-label="Dismiss">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
