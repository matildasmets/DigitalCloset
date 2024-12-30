<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>{{ $title ?? 'Digital Closet'}}</title>
</head>
<body>
    <header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full">
        <nav class="relative max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-10">
          <div class="flex items-center justify-between">
            <a class="flex-none font-semibold text-3xl text-black focus:outline-none focus:opacity-80 helvetica-extended uppercase" href="#" aria-label="Brand">Digital Closet</a>

            <div class="md:hidden">
              <button type="button" class="hs-collapse-toggle relative size-9 flex justify-center items-center text-sm font-semibold text-black focus:outline-none disabled:opacity-50 disabled:pointer-events-none" id="hs-base-header-collapse" aria-expanded="false" aria-controls="hs-base-header" aria-label="Toggle navigation" data-hs-collapse="#hs-base-header">
                <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                <svg class="hs-collapse-open:block shrink-0 hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                <span class="sr-only">Toggle navigation</span>
              </button>
            </div>
          </div>


        @if(session('user_id'))
            <div id="hs-base-header" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block" aria-labelledby="hs-base-header-collapse">
                <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
                    <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center md:justify-end gap-0.5 md:gap-1">
                        <a href="/logout" class="helvetica-pixel text-3xl p-2 flex items-center text-black focus:outline-none focus:text-black hover:" href="#" aria-current="page">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        @endif

        </nav>
    </header>

    @if(isset($pagina))
        <div class="bg-neutral-800 mb-5">
            <div class="max-w-[66rem] w-full md:flex md:items-center md:justify-between md:gap-3 mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="h-16 flex items-center justify-between">
                    <h1 class="text-2xl font-semibold text-white">{{ $pagina }}</h1>
                </div>
            </div>
        </div>
    @endif

    {{ $slot }}

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/preline.js') }}"></script>
</body>
</html>
