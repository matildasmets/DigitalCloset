@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
@endpush
<x-layout>
    <x-slot:pagina>
        <a href="/dashboard" class="flex items-center">
            <x-fas-arrow-left class="w-6 h-6 text-white mr-2" /> Go back
        </a>
    </x-slot:pagina>


    <div class="relative max-w-[66rem] w-full mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">
            <h1 class="text-lg mb-3">Choose some pants</h1>

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            @error('pants')
                <div class="mb-4 text-red-600">
                    {{ $message }}
                </div>
            @enderror

            <form action="/put-outfit-together/add/pants" method="POST">
                @csrf

                <div class="swiper-container mb-5">
                    <div class="swiper-wrapper">
                        @foreach ($pants as $pair)
                            <div class="swiper-slide">
                                <label for="{{ $pair->id }}"
                                    class="cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow h-full flex flex-col">
                                    <img src="{{ asset('storage/' . $pair->photo) }}" alt="{{ $pair->name }}"
                                        class="w-full aspect-square object-cover bg-white" />
                                    <div class="p-4 flex-grow flex flex-col">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h3
                                                    class="text-xs line-clamp-1 overflow-hidden text-white font-semibold">
                                                    {{ $pair->name }}</h3>
                                            </div>
                                            <input type="radio" name="pants" value="{{ $pair->id }}"
                                                id="{{ $pair->id }}" class="size-5 border-gray-300 text-blue-500" />
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <button type="submit"
                    class="py-2 px-3 w-full items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                    aria-label="Close" data-hs-overlay="#hs-put-outfit-together-modal">
                    Go to next step
                </button>
            </form>
        </div>
    </div>
</x-layout>
