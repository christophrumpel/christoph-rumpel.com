<div x-data="{ show: true}">
    <div class="relative bg-highlightTurquoise"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform"
         x-transition:enter-end="opacity-100 transform"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform"
         x-transition:leave-end="opacity-0 transform">
        <div class="max-w-screen-xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
            <div class="pr-16 sm:text-center sm:px-16">
                <p class="font-medium text-textBlue">
        <span class="md:hidden">
         🎁 Only Today 20% Discount Code "ONE-YEAR-LCA" For Laravel Core Adventures
        </span>
                    <span class="hidden md:inline">
         🎁 Only Today 20% Discount Code "ONE-YEAR-LCA" For Laravel Core Adventures
        </span>
                    <span class="block sm:ml-2 sm:inline-block">
          <a href="https://laravelcoreadventures.com/pro" class="text-textBlue font-bold underline">
            Get The Course &rarr;
          </a>
        </span>
                </p>
            </div>
            <div class="absolute inset-y-0 right-0 pt-1 pr-1 flex items-start sm:pt-1 sm:pr-2 sm:items-start">
                <button @click="show = false" type="button"
                        class="flex p-2 rounded-md hover:bg-highlightPurple focus:outline-none focus:bg-highlightPurple transition ease-in-out duration-150"
                        aria-label="Dismiss">
                    <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
