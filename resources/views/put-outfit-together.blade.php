<x-layout>
    <x-slot:pagina>
        <a href="/dashboard" class="flex items-center">
            <x-fas-arrow-left class="w-6 h-6 text-white mr-2" /> Go back
        </a>
    </x-slot:pagina>
    <div
        class="max-w-[66rem] w-full md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <p>Let's get started. How would you like to call this outfit?</p>

        <form action="/put-outfit-together" method="post" class="mt-4 w-full">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full">
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-sm font-medium">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-main dark:border-neutral-700 dark:placeholder-neutral-400 sm:text-sm" placeholder="Ex. Casual orange outfit" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="occasion" class="text-sm font-medium">Occasion</label>
                    <select name="occasion" id="occasion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-main dark:border-neutral-700 dark:placeholder-neutral-400 sm:text-sm" required>
                        <option value="casual">Casual</option>
                        <option value="formal">Formal</option>
                        <option value="party">Party</option>
                        <option value="work">Work</option>
                        <option value="sport">Sport</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="mt-3 w-full transition-all py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none text-center">
                Submit
            </button>
        </form>
</x-layout>
