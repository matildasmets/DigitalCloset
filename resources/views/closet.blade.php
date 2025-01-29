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

            @if (!empty($outfits))
                <h1 class="text-lg mb-3">Outfits</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 mb-5">
                    @foreach ($outfits as $type => $item)
                        @if ($item)
                            <a href="/outfit/{{ $item->id }}" class="transition-all block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg">
                                <div class="grid grid-cols-2 aspect-square">
                                    @if ($item->top)
                                        <img src="{{ asset('storage/' . $item->top) }}" alt="Top" class="w-full h-full object-cover bg-white" loading="lazy">
                                    @endif
                                    @if ($item->pants)
                                        <img src="{{ asset('storage/' . $item->pants) }}" alt="Pants" class="w-full h-full object-cover bg-white" loading="lazy">
                                    @endif
                                    @if ($item->shoes)
                                        <img src="{{ asset('storage/' . $item->shoes) }}" alt="Shoes" class="w-full h-full object-cover bg-white" loading="lazy">
                                    @endif
                                    @if ($item->jacket && $item->accessories)
                                        <div class="grid grid-cols-2">
                                            <img src="{{ asset('storage/' . $item->jacket) }}" alt="Jacket" class="w-full h-full object-cover bg-white" loading="lazy">
                                            <img src="{{ asset('storage/' . $item->accessories) }}" alt="Accessories" class="w-full h-full object-cover  bg-white" loading="lazy">
                                        </div>
                                    @else
                                        @if ($item->jacket)
                                            <img src="{{ asset('storage/' . $item->jacket) }}" alt="Jacket" class="w-full h-full object-cover bg-white" loading="lazy">
                                        @endif
                                        @if ($item->accessories)
                                            <img src="{{ asset('storage/' . $item->accessories) }}" alt="Accessories" class="w-full h-full object-cover bg-white" loading="lazy">
                                        @endif
                                    @endif
                                </div>
                                <div class="p-4 h-full">
                                    <h3 class="text-lg text-white font-semibold">{{ $item->name }}</h3>
                                    <p class="text-gray-300">{{ ucfirst($item->type) }}</p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif

            @if (!$clothing->isEmpty())
                @if(!$outfits->isEmpty())
                    <h1 class="text-lg mb-3">Closet</h1>
                @endif
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
