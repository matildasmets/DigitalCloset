<x-layout>
    <x-slot:pagina>
        <a href="/dashboard" class="flex items-center">
            <x-fas-arrow-left class="w-6 h-6 text-white mr-2" /> Go back
        </a>
    </x-slot:pagina>
    <div
        class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="relative">
            <h1 class="text-lg mb-3">{{ $outfit['name']}} </h1>
            <p class="text-base text-gray-600">{{ ucfirst($outfit['type']) }}</p>

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            @if (!empty($outfit))
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4 mb-5">
                    @if (!empty($outfit['top']['photo'] && $outfit['top']['name']))
                        <div
                            class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $outfit['top']['photo']) }}" alt="{{ $outfit['top']['name'] }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4">
                                <h3 class="text-lg text-white font-semibold">{{ $outfit['top']['name'] }}</h3>
                                <p class="text-gray-300">Top</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($outfit['pants']['photo'] && $outfit['pants']['name']))
                        <div
                            class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $outfit['pants']['photo']) }}" alt="{{ $outfit['pants']['name'] }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4">
                                <h3 class="text-lg text-white font-semibold">{{ $outfit['pants']['name'] }}</h3>
                                <p class="text-gray-300">Pants</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($outfit['shoes']['photo'] && $outfit['shoes']['photo']))
                        <div
                            class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $outfit['shoes']['photo']) }}" alt="{{ $outfit['shoes']['name'] }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4">
                                <h3 class="text-lg text-white font-semibold">{{ $outfit['shoes']['name'] }}</h3>
                                <p class="text-gray-300">Shoes</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($outfit['jacket']['photo'] && $outfit['jacket']['name']))
                        <div
                            class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $outfit['jacket']['photo']) }}" alt="{{ $outfit['jacket']['name'] }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4">
                                <h3 class="text-lg text-white font-semibold">{{ $outfit['jacket']['name'] }}</h3>
                                <p class="text-gray-300">Jacket</p>
                            </div>
                        </div>
                    @endif

                    @if (!empty($outfit['accessories']['photo'] && $outfit['accessories']['name']))
                        <div
                            class="block cursor-pointer rounded-lg bg-neutral-800 shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <img src="{{ asset('storage/' . $outfit['accessories']['photo']) }}" alt="{{ $outfit['accessories']['name'] }}"
                                class="w-full aspect-square bg-white object-cover object-top" loading="lazy">
                            <div class="p-4">
                                <h3 class="text-lg text-white font-semibold">{{ $outfit['accessories']['name'] }}</h3>
                                <p class="text-gray-300">Accessory</p>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <p class="text-lg mb-5">Your outfit is incomplete... try adding some items!</p>
            @endif
        </div>
</x-layout>
