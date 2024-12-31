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

            @if ($top || $pants || $shoes || $jacket || $accessory)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @if ($top)
                        <div class="bg-white shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $top->photo) }}" alt="{{ $top->name }}"
                                class="w-full h-64 object-cover object-top">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $top->name }}</h3>
                                <p class="text-gray-600">Top</p>
                            </div>
                        </div>
                    @endif

                    @if ($pants)
                        <div class="bg-white shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $pants->photo) }}" alt="{{ $pants->name }}"
                                class="w-full h-64 object-cover object-top">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $pants->name }}</h3>
                                <p class="text-gray-600">Pants</p>
                            </div>
                        </div>
                    @endif

                    @if ($shoes)
                        <div class="bg-white shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $shoes->photo) }}" alt="{{ $shoes->name }}"
                                class="w-full h-64 object-cover object-top">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $shoes->name }}</h3>
                                <p class="text-gray-600">Shoes</p>
                            </div>
                        </div>
                    @endif

                    @if ($jacket)
                        <div class="bg-white shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $jacket->photo) }}" alt="{{ $jacket->name }}"
                                class="w-full h-64 object-cover object-top">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $jacket->name }}</h3>
                                <p class="text-gray-600">Jacket</p>
                            </div>
                        </div>
                    @endif

                    @if ($accessory)
                        <div class="bg-white shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $accessory->photo) }}" alt="{{ $accessory->name }}"
                                class="w-full h-64 object-cover object-top">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $accessory->name }}</h3>
                                <p class="text-gray-600">Accessory</p>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="text-center">
                    <p class="text-lg">No outfit could be made.</p>
                </div>
            @endif
        </div>
</x-layout>
