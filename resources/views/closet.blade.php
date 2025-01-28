<x-layout>
    <x-slot:pagina>
        <a href="/dashboard" class="flex items-center">
            <x-fas-arrow-left class="w-6 h-6 text-white mr-2" /> Go back
        </a>
    </x-slot:pagina>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            @if (!$clothing->isEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 mb-5">
                    @foreach ($clothing as $item)
                        <div class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4 h-full">
                                <h3 class="text-lg text-white font-semibold">{{ $item->name }}</h3>
                                <p class="text-gray-300">{{ ucfirst($item->type) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-lg mb-5">Your closet seems to be empty... try adding some items!</p>
            @endif
        </div>
</x-layout>
