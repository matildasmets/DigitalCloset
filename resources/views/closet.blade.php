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
            @else
                <p class="text-lg">Your closet seems to be empty... try adding some items!</p>
            @endif
        </div>
</x-layout>
