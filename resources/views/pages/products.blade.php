<x-main-layout title="Products" page="products" divvewire="false">
    <main class="products">

        <div>
            <div x-data="{ open: new URLSearchParams(location.search).get('searchTerm') ?? false }">
                <div class="flex flex-col lg:flex-row items-center lg:justify-between mb-16">
                    <h2 class="font-display text-4xl text-textBlue">Here are my latest products:</h2>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 post-list">

                    <!-- Writing Readable PHP -->
                    <div class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8" href="https://writing-readable-php.com/">
                            <img class="mb-4" src="/images/pages/products_wrp.png" alt="Banner of the video course Writing Readable PHP">
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue mb-4">
                                Writing Readable PHP
                            </h2>
                            <h3 class="text-xl">Learn how to write <strong>clean code</strong> that is simple, easy to read, update, and maintain. This is a course Spatie and I created together.</h3>
                        </a>
                    </div>
                    <!-- Writing Readable PHP -->

                    <!-- Mastering PhpStorm -->
                    <div class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://masteringphpstorm.com/">
                            <img class="mb-4" src="/images/pages/products_mp.png" alt="Banner of the video course Mastering PhpStorm">
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue mb-4">
                                Mastering PhpStorm
                            </h2>
                            <h3 class="text-xl">A <b>video course</b> for the state-of-the-art PHP developer who wants to work efficiently and successfully in a beautiful IDE.</h3>
                        </a>
                    </div>
                    <!-- Mastering PhpStorm -->

                    <!-- Laravel Core Adventures -->
                    <div class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://laravelcoreadventures.com">
                            <img class="mb-4" src="/images/pages/products_lca.jpg" alt="Banner of the video course Laravel Core Adventures">
                            <h2 class="font-display sm:text-xl lg:text-3xl text-textBlue mb-4">
                                Laravel Core Adventures
                            </h2>
                            <h3 class="text-xl">A <b>video course</b> to master the core of Laravel without stumbdivng over its magic. 🧙‍</h3>
                        </a>
                    </div>
                    <!-- Laravel Core Adventures -->

                    <!-- Call It A Day Podcast-->
                    <div class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://caldivtaday.transistor.fm">
                            <img class="mb-4" src="/images/pages/products_podcast.png" alt="Banner of the video course Laravel Core Adventures">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue mb-4">
                                Call It A Day
                            </h2>
                            <h3 class="text-xl">A <b>podcast</b> about my experiences as a developer and a one-person business owner.</h3>
                        </a>
                    </div>
                    <!-- Call It A Day Podcast-->

                    <!-- Build Chatbots With php -->
                    <div class="my-8 bg-white border-textBlue border-2">
                        <a class="block p-8"
                           href="https://christoph-rumpel.com/build-chatbots-with-php">
                            <img class="mb-4" src="/images/pages/products_bcwp.png" alt="Banner of the video course Build Chatbots With php">
                            <h2 class="font-display sm: text-xl lg:text-3xl text-textBlue">
                                Build Chatbots With php
                            </h2>
                            <h3 class="text-xl">A <b>book</b> about building chatbots in PHP. (not available anymore)</h3>
                        </a>
                    </div>
                    <!-- Build Chatbots With php -->


                </div>
            </div>

        </div>


    </main>
</x-main-layout>
