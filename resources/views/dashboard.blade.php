<x-layout>
    <x-slot:pagina>Dashboard</x-slot:pagina>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <p class="mb-3">Hi {{ session('first_name') }} {{ session('last_name') }} 👋 What would you like to do?</p>
            <div class="gap-y-3">
                <p class="transition-all hover:ms-2 flex items-center"><a href="/put-outfit-together"
                        class="text-2xl font-bold helvetica-extended flex items-center"><x-fas-arrow-right
                            class="w-6 h-6 text-black mr-2" /> Put an outfit together</a></p>
                <p class="transition-all hover:ms-2 flex items-center"><a href="/random"
                        class="text-2xl font-bold helvetica-extended flex items-center"><x-fas-arrow-right
                            class="w-6 h-6 text-black mr-2" /> Fetch a random outfit</a></p>
                <p class="transition-all hover:ms-2 flex items-center"><a href="/closet"
                        class="text-2xl font-bold helvetica-extended flex items-center"><x-fas-arrow-right
                            class="w-6 h-6 text-black mr-2" /> View my closet</a></p>
                <p class="transition-all hover:ms-2 flex items-center"><a
                        class="cursor-pointer text-2xl font-bold helvetica-extended flex items-center"
                        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-modal"
                        data-hs-overlay="#hs-add-modal"><x-fas-arrow-right class="w-6 h-6 text-black mr-2" /> Add a new
                        item</a></p>
            </div>

            @if(!$clothing->isEmpty())
                <h2 class="mt-3 text-3xl helvetica-pixel">Recent item uploads</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                    @foreach ($clothing as $item)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                                class="w-full h-auto object-cover group-hover:brightness-75" loading="lazy">
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl opacity-0 group-hover:opacity-100 transition-opacity">
                                {{ $item->name }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div id="hs-add-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-modal-label" class="font-bold text-gray-800 dark:text-white">
                        What would you like to add?
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="mb-3 text-white">For optimal results, please upload photos that have equal width and
                        height dimensions and a transparent background.</p>
                    <div class="flex flex-col gap-3">
                        <button
                            class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-top-modal"
                            data-hs-overlay="#hs-add-top-modal">Top</button>
                        <button
                            class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-pants-modal"
                            data-hs-overlay="#hs-add-pants-modal">Pants</button>
                        <button
                            class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-shoes-modal"
                            data-hs-overlay="#hs-add-shoes-modal">Shoes</button>
                        <button
                            class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-jacket-modal"
                            data-hs-overlay="#hs-add-jacket-modal">Jacket</button>
                        <button
                            class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-add-accessory-modal"
                            data-hs-overlay="#hs-add-accessory-modal">Accessory</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Modal -->
    <div id="hs-add-top-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-top-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-top-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Add top
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-top-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="/dashboard/add/top" method="POST" id="hs-add-top-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-neutral-400 dark:text-white sm:text-sm"
                                placeholder="Ex. Red ribbed sweater" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white"
                                for="file_input">Photo</label>
                            <input name="photo"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-neutral-400 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file"
                                accept=".jpeg,.png,.jpg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG or
                                PNG.</p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-add-modal">
                        Go back
                    </button>
                    <button type="submit" form="hs-add-top-form"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-white text-black hover:bg-white/95 focus:outline-none focus:bg-white/95 disabled:opacity-50 disabled:pointer-events-none">
                        Add to closet
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pants Modal -->
    <div id="hs-add-pants-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-pants-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-pants-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Add pants
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-pants-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="/dashboard/add/pants" method="POST" id="hs-add-pants-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-neutral-400 dark:text-white sm:text-sm"
                                placeholder="Ex. Blue denim jeans" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white"
                                for="file_input">Photo</label>
                            <input name="photo"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-neutral-400 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file"
                                accept=".jpeg,.png,.jpg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG or
                                PNG.</p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-add-modal">
                        Go back
                    </button>
                    <button type="submit" form="hs-add-pants-form"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-white text-black hover:bg-white/95 focus:outline-none focus:bg-white/95 disabled:opacity-50 disabled:pointer-events-none">
                        Add to closet
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Shoes Modal -->
    <div id="hs-add-shoes-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-shoes-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-shoes-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Add shoes
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-shoes-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="/dashboard/add/shoes" method="POST" id="hs-add-shoes-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-neutral-400 dark:text-white sm:text-sm"
                                placeholder="Ex. White sneakers" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white"
                                for="file_input">Photo</label>
                            <input name="photo"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-neutral-400 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file"
                                accept=".jpeg,.png,.jpg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG or
                                PNG.</p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-add-modal">
                        Go back
                    </button>
                    <button type="submit" form="hs-add-shoes-form"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-white text-black hover:bg-white/95 focus:outline-none focus:bg-white/95 disabled:opacity-50 disabled:pointer-events-none">
                        Add to closet
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jacket Modal -->
    <div id="hs-add-jacket-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-jacket-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-jacket-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Add jacket
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-jacket-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="/dashboard/add/jacket" method="POST" id="hs-add-jacket-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-neutral-400 dark:text-white sm:text-sm"
                                placeholder="Ex. Leather jacket" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white"
                                for="file_input">Photo</label>
                            <input name="photo"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-neutral-400 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file"
                                accept=".jpeg,.png,.jpg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG or
                                PNG.</p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-add-modal">
                        Go back
                    </button>
                    <button type="submit" form="hs-add-jacket-form"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-white text-black hover:bg-white/95 focus:outline-none focus:bg-white/95 disabled:opacity-50 disabled:pointer-events-none">
                        Add to closet
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Accessory Modal -->
    <div id="hs-add-accessory-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-accessory-modal-label">
        <div
            class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div
                class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                    <h3 id="hs-add-accessory-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Add accessory
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-add-accessory-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="/dashboard/add/accessory" method="POST" id="hs-add-accessory-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-neutral-400 dark:text-white sm:text-sm"
                                placeholder="Ex. Long gold chain" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-white"
                                for="file_input">Photo</label>
                            <input name="photo"
                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-neutral-400 focus:outline-none dark:bg-neutral-800 dark:border-neutral-700 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file"
                                accept=".jpeg,.png,.jpg">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG or
                                PNG.</p>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-add-modal">
                        Go back
                    </button>
                    <button type="submit" form="hs-add-accessory-form"
                        class="transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-white text-black hover:bg-white/95 focus:outline-none focus:bg-white/95 disabled:opacity-50 disabled:pointer-events-none">
                        Add to closet
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
