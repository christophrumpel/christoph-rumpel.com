<x-main-layout title="Products" page="products" livewire="false">
    <main class="products">

        <div>
            <div x-data="{ open: new URLSearchParams(location.search).get('searchTerm') ?? false }">
                <div class="flex flex-col lg:flex-row items-center lg:justify-between mb-16">
                    <h2 class="font-display text-4xl text-textBlue">Here are my latest products:</h2>

                </div>

                <ul class="post-list">
                    <!-- Mastering PhpStorm -->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://masteringphpstorm.com/">
                            <img class="mb-4" src="/images/pages/products_mp.png" alt="Banner of the video course Mastering PhpStorm">
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue">
                                Mastering PhpStorm
                            </h2>
                        </a>
                    </li>
                    <!-- Mastering PhpStorm -->

                    <!-- Laravel Core Adventures -->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://laravelcoreadventures.com">
                            <img class="mb-4" src="/images/pages/products_lca.jpg" alt="Banner of the video course Laravel Core Adventures">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue">
                                Laravel Core Adventures
                            </h2>
                        </a>
                    </li>
                    <!-- Laravel Core Adventures -->

                    <!-- Build Chatbots With php -->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://christoph-rumpel.com/build-chatbots-with-php">
                            <img class="mb-4" src="/images/pages/products_bcwp.png" alt="Banner of the video course Build Chatbots With php">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue">
                                Build Chatbots With php
                            </h2>
                        </a>
                    </li>
                    <!-- Build Chatbots With php -->


                </ul>
            </div>

        </div>


    </main>
</x-main-layout>
