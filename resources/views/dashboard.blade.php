<x-layout>
    <x-slot:pagina>Dashboard</x-slot:pagina>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">
            <p class="mb-3">Hi {{ session('first_name') }} {{ session('last_name') }} 👋 What would you like to do?</p>
            <div class="gap-y-3">
                <p class="transition-all hover:ms-2 flex items-center"><a href=""
                        class="text-3xl helvetica-pixel flex items-center"><x-fas-arrow-right
                            class="w-6 h-6 text-black mr-2" /> Put an outfit together</a></p>
                <p class="transition-all hover:ms-2 flex items-center"><a
                        class="cursor-pointer text-3xl helvetica-pixel flex items-center" aria-haspopup="dialog"
                        aria-expanded="false" aria-controls="hs-scale-animation-modal"
                        data-hs-overlay="#hs-scale-animation-modal"><x-fas-arrow-right
                            class="w-6 h-6 text-black mr-2" /> Add a new item</a></p>
            </div>
        </div>

        <div id="hs-scale-animation-modal"
            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
            role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
            <div
                class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                <div
                    class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                        <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                            What would you like to add?
                        </h3>
                        <button type="button"
                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                            aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-4 overflow-y-auto">
                        <div class="flex flex-col gap-3">
                            <button
                                class="transition-all w-full py-2 px-4 bg-neutral-700 text-white rounded hover:bg-neutral-600">Top</button>
                            <button
                                class="transition-all w-full py-2 px-4 bg-neutral-700 text-white rounded hover:bg-neutral-600">Pants</button>
                            <button
                                class="transition-all w-full py-2 px-4 bg-neutral-700 text-white rounded hover:bg-neutral-600">Shoes</button>
                            <button
                                class="transition-all w-full py-2 px-4 bg-neutral-700 text-white rounded hover:bg-neutral-600">Jacket</button>
                            <button
                                class="transition-all w-full py-2 px-4 bg-neutral-700 text-white rounded hover:bg-neutral-600">Accessory</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
