<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('code') @yield('title')</title>
    <meta name="robots" content="noindex, nofollow" />

    @include('components.file-assets')
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none -z-10">
            <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[720px] h-[320px] bg-amber-500/10 blur-[110px] rounded-full"></div>
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-[540px] h-[220px] bg-orange-500/10 blur-[90px] rounded-full"></div>
        </div>

        <div class="max-w-screen-xl mx-auto text-center">
            
            <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">
                @yield('code')
            </h1>
            
            <p class="mb-4 text-3xl tracking-tight font-bold text-white md:text-4xl uppercase">
                @yield('title')
            </p>
            
            <p class="mb-8 text-lg font-light text-gray-400 max-w-2xl mx-auto">
                @yield('message')
            </p>
            
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-bold uppercase tracking-wide text-black transition-all duration-200 bg-gradient-to-r from-amber-400 to-orange-500 rounded-lg hover:from-amber-300 hover:to-orange-400 focus:ring-4 focus:outline-none focus:ring-amber-900/50 shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5">
                Return to Home
            </a>

        </div>
    </main>

    @include('components.footer')

</body>
</html>