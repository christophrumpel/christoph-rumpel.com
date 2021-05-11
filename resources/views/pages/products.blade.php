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
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue mb-4">
                                Mastering PhpStorm
                            </h2>
                            <h3 class="text-xl">A <b>video course</b> for the state-of-the-art PHP developer who wants to work efficiently and successfully in a beautiful IDE.</h3>
                        </a>
                    </li>
                    <!-- Mastering PhpStorm -->

                    <!-- Laravel Core Adventures -->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://laravelcoreadventures.com">
                            <img class="mb-4" src="/images/pages/products_lca.jpg" alt="Banner of the video course Laravel Core Adventures">
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue mb-4">
                                Laravel Core Adventures
                            </h2>
                            <h3 class="text-xl">A <b>video course</b> to master the core of Laravel without stumbling over its magic. 🧙‍</h3>
                        </a>
                    </li>
                    <!-- Laravel Core Adventures -->

                    <!-- Call It A Day Podcast-->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://callitaday.transistor.fm">
                            <img class="mb-4" src="/images/pages/products_podcast.png" alt="Banner of the video course Laravel Core Adventures">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue mb-4">
                                Call It A Day
                            </h2>
                            <h3 class="text-xl">A <b>podcast</b> about my experiences as a developer and a one-person business owner.</h3>
                        </a>
                    </li>
                    <!-- Call It A Day Podcast-->

                    <!-- Build Chatbots With php -->
                    <li class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://christoph-rumpel.com/build-chatbots-with-php">
                            <img class="mb-4" src="/images/pages/products_bcwp.png" alt="Banner of the video course Build Chatbots With php">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue">
                                Build Chatbots With php
                            </h2>
                            <h3 class="text-xl">A <b>book</b> about building chatbots in PHP. (not available anymore)</h3>
                        </a>
                    </li>
                    <!-- Build Chatbots With php -->


                </ul>
            </div>

        </div>


    </main>
</x-main-layout>
