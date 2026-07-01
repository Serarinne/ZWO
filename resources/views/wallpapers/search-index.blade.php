<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Search Wallpapers | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('wallpapers.search') }}" />
    <meta name="description" content="Search thousands of high-quality Zenless Zone Zero wallpapers on {{ env('APP_NAME') }}. Find 4K and HD backgrounds of your favorite agents, factions, and characters for your PC or smartphone.">
    <meta name="keywords" content="search, find wallpaper, zzz wallpapers, zzz wallpaper, zenless zone zero, agent wallpaper, 4K wallpaper, HD wallpaper">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Search ZZZ Wallpapers | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Search thousands of high-quality Zenless Zone Zero wallpapers on {{ env('APP_NAME') }}." />
    <meta property="og:url" content="{{ route('wallpapers.search') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Search ZZZ Wallpapers | {{ env('APP_NAME') }}" />
    <meta name="twitter:description" content="Search thousands of high-quality Zenless Zone Zero wallpapers on {{ env('APP_NAME') }}." />

    @include('components.file-assets')
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative flex flex-col items-center overflow-hidden pt-12 pb-20">

        <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute inset-0 opacity-[0.03]"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 w-full max-w-6xl relative z-10">

            <div class="text-center mb-10">
                <span class="inline-block py-1 px-3 rounded-full bg-zinc-900 border border-zinc-700 text-xs font-semibold text-amber-400 mb-4 tracking-wider">
                    Wallpaper Search Engine
                </span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight">
                    Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Agent</span>
                </h1>
                <p class="text-lg text-gray-400 max-w-lg mx-auto">
                    Search through thousands of high-resolution wallpapers. Agents, factions, artists, or specific tags.
                </p>
            </div>

            <div class="max-w-2xl mx-auto mb-20">
                <form action="{{ route('wallpapers.search') }}" method="GET" class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl blur opacity-30 group-hover:opacity-60 transition duration-200"></div>

                    <div class="relative flex items-center">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                            <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" 
                               id="search-query" 
                               name="q" 
                               class="block w-full p-5 pl-14 text-base text-white bg-zinc-900 border border-zinc-700 rounded-xl focus:ring-0 focus:border-amber-500 placeholder-gray-500 shadow-2xl" 
                               placeholder="Try 'Anby', 'Nicole', or 'Cunning Hares'..." 
                               required 
                               autofocus
                               autocomplete="off">

                        <button type="submit" class="absolute right-2.5 bg-amber-500 hover:bg-orange-500 text-black font-bold rounded-lg text-sm px-6 py-2.5 transition-colors shadow-lg shadow-amber-500/20">
                            Search
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-300 tracking-wide font-semibold mb-3">Trending Searches</p>
                    <div class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('wallpapers.search', ['q' => 'Anby']) }}" class="px-3 py-1.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 rounded-full text-xs text-gray-300 hover:text-amber-300 transition-colors">Anby</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Nicole']) }}" class="px-3 py-1.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 rounded-full text-xs text-gray-300 hover:text-amber-300 transition-colors">Nicole</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Billy']) }}" class="px-3 py-1.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 rounded-full text-xs text-gray-300 hover:text-amber-300 transition-colors">Billy</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Ellen']) }}" class="px-3 py-1.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 rounded-full text-xs text-gray-300 hover:text-amber-300 transition-colors">Ellen</a>
                        <a href="{{ route('wallpapers.search', ['q' => 'Cunning Hares']) }}" class="px-3 py-1.5 bg-zinc-900 hover:bg-zinc-800 border border-zinc-700 rounded-full text-xs text-gray-300 hover:text-amber-300 transition-colors">Cunning Hares</a>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <h2 class="text-2xl font-bold text-white mb-8 text-center tracking-wide">Explore Collection</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                    <a href="{{ route('characters.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-zinc-700 hover:border-amber-500 transition-all duration-300">
                        <img src="https://storage.ntewallpapers.com/thumbnail/000/000/056/56.webp" alt="Agents - Meet your favorite Zenless Zone Zero agents and characters" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <div class="text-xl font-bold text-white group-hover:text-amber-400 transition tracking-wide">Agents</div>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Meet your favorite agents and playable characters</p>
                        </div>
                    </a>

                    <a href="{{ route('tags.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-zinc-700 hover:border-orange-500 transition-all duration-300">
                        <img src="https://storage.ntewallpapers.com/thumbnail/000/000/043/43.webp" alt="Tags - Filter by style, faction, or specific traits" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <div class="text-xl font-bold text-white group-hover:text-orange-400 transition tracking-wide">Tags</div>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Filter by style, faction, or specific traits</p>
                        </div>
                    </a>

                    <a href="{{ route('artists.index') }}" class="group relative h-40 rounded-2xl overflow-hidden border border-zinc-700 hover:border-yellow-500 transition-all duration-300">
                        <img src="https://storage.ntewallpapers.com/thumbnail/000/000/040/40.webp" alt="Artists - Gallery of talented Zenless Zone Zero illustrators" class="w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-50 group-hover:opacity-70">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-900/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-5">
                            <div class="text-xl font-bold text-white group-hover:text-yellow-400 transition tracking-wide">Artists</div>
                            <p class="text-[10px] leading-tight text-gray-400 group-hover:text-gray-200">Gallery of talented illustrators and fan artists</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
</body>
</html>