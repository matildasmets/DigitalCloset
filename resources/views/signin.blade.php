<x-layout>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2 mt-28">
        <div class="relative">
            <div class="grid items-center md:grid-cols-2 gap-8 lg:gap-12">
                <div>
                    <p
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-gray-600 to-black text-transparent">
                        A unique experience of fashion
                    </p>

                    <div class="mt-4 md:mb-12 max-w-2xl">
                        <h1 class="mb-4 font-semibold text-gray-800 text-4xl lg:text-5xl">
                            A closet, but digitally.
                        </h1>
                        <p class="text-gray-600">
                            Discover the latest trends and timeless styles with a digital closet. Whether you're looking
                            for inspiration or ready to revamp your wardrobe, you are covered. Join the community and
                            start creating your own unique outfits today!
                        </p>
                    </div>
                </div>

                <div>
                    <form id="form" method="POST" action="/">
                        @csrf
                        <div class="lg:max-w-lg lg:mx-auto lg:me-0 ms-auto">
                            <div class="p-4 sm:p-7 flex flex-col border border-gray-200 shadow-lg">
                                <div class="text-center">
                                    <h1 class="block text-3xl font-bold text-gray-800 helvetica-pixel">Sign in to your account</h1>
                                    <p class="mt-2 text-sm text-gray-600">
                                        Don't have an account yet?
                                        <a class="text-black font-bold decoration-2 hover:underline focus:outline-none focus:underline"
                                            href="signup">
                                            Signup here
                                        </a>
                                    </p>
                                </div>

                                <div class="mt-5">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="relative col-span-full">
                                            <div class="relative">
                                                <input type="email" name="email" id="hs-hero-signup-form-floating-input-email"
                                                    class="bg-transparent peer p-4 block w-full border-gray-900 text-sm placeholder:text-transparent focus:border-black focus:ring-black disabled:opacity-50 disabled:pointer-events-none
                               focus:pt-6
                               focus:pb-2
                               [&:not(:placeholder-shown)]:pt-6
                               [&:not(:placeholder-shown)]:pb-2
                               autofill:pt-6
                               autofill:pb-2"
                                                    placeholder="you@email.com">
                                                <label for="hs-hero-signup-form-floating-input-email"
                                                    class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
                               peer-focus:scale-90
                               peer-focus:translate-x-0.5
                               peer-focus:-translate-y-1.5
                               peer-focus:text-gray-400
                               peer-[:not(:placeholder-shown)]:scale-90
                               peer-[:not(:placeholder-shown)]:translate-x-0.5
                               peer-[:not(:placeholder-shown)]:-translate-y-1.5
                               peer-[:not(:placeholder-shown)]:text-gray-400">Email</label>
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <div class="relative">
                                                <input type="password" name="password"
                                                    id="hs-hero-signup-form-floating-input-current-password"
                                                    class="bg-transparent peer p-4 block w-full border-gray-900 text-sm placeholder:text-transparent focus:border-black focus:ring-black disabled:opacity-50 disabled:pointer-events-none
                               focus:pt-6
                               focus:pb-2
                               [&:not(:placeholder-shown)]:pt-6
                               [&:not(:placeholder-shown)]:pb-2
                               autofill:pt-6
                               autofill:pb-2"
                                                    placeholder="********">
                                                <label for="hs-hero-signup-form-floating-input-current-password"
                                                    class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none
                               peer-focus:scale-90
                               peer-focus:translate-x-0.5
                               peer-focus:-translate-y-1.5
                               peer-focus:text-gray-400
                               peer-[:not(:placeholder-shown)]:scale-90
                               peer-[:not(:placeholder-shown)]:translate-x-0.5
                               peer-[:not(:placeholder-shown)]:-translate-y-1.5
                               peer-[:not(:placeholder-shown)]:text-gray-400">Password</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <button type="submit"
                                            class="submit-button transition-all w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium border border-transparent bg-gray-900 text-white hover:bg-black focus:outline-none focus:bg-black disabled:opacity-50 disabled:pointer-events-none uppercase helvetica-extended">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>
