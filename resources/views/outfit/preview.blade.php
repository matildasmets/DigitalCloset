<x-layout>
    <x-slot:pagina>
        <a href="/dashboard" class="flex items-center">
            <x-fas-arrow-left class="w-6 h-6 text-white mr-2" /> Go back
        </a>
    </x-slot:pagina>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">
            <h1 class="text-lg mb-3">This is the outfit you've put together...</h1>

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            @if (!empty($outfit))
                {{-- @dd($outfit) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 mb-5">
                    @foreach ($outfit as $type => $item)
                        @if ($item)
                            <div class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                                    class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                                <div class="p-4 h-full">
                                    <h3 class="text-lg text-white font-semibold">{{ $item->name }}</h3>
                                    <p class="text-gray-300">{{ ucfirst($item->type) }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <form action="/put-outfit-together/save" method="POST" class="mb-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="/dashboard"
                            class="py-2 px-3 w-full items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-red-500 text-white shadow-sm hover:bg-red-600 focus:outline-none focus:bg-red-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-red-700 dark:border-red-700 dark:text-white dark:hover:bg-red-800 dark:focus:bg-red-800 text-center">
                            Cancel
                        </a>
                        <button type="submit"
                            class="py-2 px-3 w-full items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                            aria-label="Close" data-hs-overlay="#hs-put-outfit-together-modal">
                            Save outfit
                        </button>
                    </div>
                </form>
            @else
                <p class="text-lg mb-5">Your outfit is incomplete... try adding some items!</p>
            @endif
        </div>
</x-layout>
