<div id="newsletter">
    <div class="max-w-screen-xl mx-auto py-12 lg:py-16">
        <div class="px-6 py-6 bg-textBlue rounded-lg md:py-12 md:px-12 lg:py-16 lg:px-16 xl:flex xl:items-center">
            <div class="xl:w-0 xl:flex-1">
                <h2 class="text-2xl leading-8 font-display tracking-tight text-white sm:text-3xl sm:leading-9">
                    {{ $title ?? 'Do you enjoy my posts?' }}
                </h2>
                <p class="mt-3 max-w-3xl text-lg leading-6 text-indigo-200" id="newsletter-headline">
                    Sign up for my newsletter to receive updates on my latest content.
                </p>
            </div>
            <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                <form class="sm:flex" aria-labelledby="newsletter-headline" method="POST"
                      action="https://christophrumpel.mailcoach.app/subscribe/362d69c8-a896-44be-8568-6981787cc3a7"
                      type="POST">
                    @csrf
                    <div style="position: absolute; left: -9999px">
                        <label for="website-phone">Your phone</label>
                        <input type="text" id="website-phone" name="phone" tabindex="-1" autocomplete="nope"/>
                    </div>
                    <input aria-label="Email address" type="email" name="email" required
                           class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out"
                           placeholder="Enter your email"/>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button type="submit"
                                class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-highlightPurple hover:bg-highlightPurpleDark focus:outline-none focus:bg-indigo-400 transition duration-150 ease-in-out">
                            Let's do this
                        </button>
                    </div>
                </form>
                <p class="mt-3 text-sm leading-5 text-indigo-200">
                    You will receive monthly updates on my latest articles and products.
                    I do care about the protection of your data. Read my
                    <a href="{{ route('page.privacy-policy') }}" class="text-white font-medium underline">
                        Privacy Policy.
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
