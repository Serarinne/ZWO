<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>My Favorites - {{ env('APP_NAME') }}</title>
    <meta name="description" content="View and manage your saved Zenless Zone Zero wallpapers on {{ env('APP_NAME') }}." />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('favorites.index') }}" />

    <x-file-assets />
    
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    <x-navigation />

    <main class="flex-grow">
        {{-- Hero Header --}}
        <div class="relative bg-zinc-900 border-b border-zinc-800 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 via-zinc-900 to-orange-500/10 opacity-60 blur-3xl scale-110"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
                <div class="mb-6 flex flex-wrap items-center gap-2 text-xs font-bold text-gray-400 tracking-widest">
                    <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors focus-visible:outline-none">Home</a>
                    <span class="text-zinc-600">&bull;</span>
                    <span class="text-amber-400">My Favorites</span>
                </div>

                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    {{-- Icon Box --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-32 h-32 md:w-48 md:h-48 rounded-2xl overflow-hidden border-4 border-zinc-800 shadow-2xl relative z-10 bg-zinc-900 flex items-center justify-center">
                            <svg class="w-16 h-16 md:w-24 md:h-24 text-amber-400 drop-shadow-[0_0_15px_rgba(251,191,36,0.35)] group-hover:scale-110 transition-transform duration-500" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-amber-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    <div class="flex-grow text-center md:text-left pt-1 w-full md:w-auto">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                            My Favorites
                        </h1>

                        <div class="max-w-xl mx-auto md:mx-0 mb-6">
                            <p class="text-gray-300 text-sm md:text-base leading-relaxed">
                                @if($wallpapers->total() > 0)
                                    You have saved <span class="text-amber-400 font-bold">{{ $wallpapers->total() }}</span> ZZZ wallpapers to your personal collection.
                                @else
                                    Your collection is currently empty. Start building it by exploring the gallery and saving the Zenless Zone Zero wallpapers you love.
                                @endif
                            </p>
                        </div>

                        @if($wallpapers->total() > 0)
                            <div class="flex justify-center md:justify-start">
                                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 hover:border-amber-500/50 transition-all text-sm font-medium text-gray-300 hover:text-white group">
                                    Browse More Wallpapers
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($wallpapers->total() > 0)
            {{-- Filter/Count Bar --}}
            <div class="border-b border-zinc-800 bg-zinc-900/90 top-16 z-40 backdrop-blur-md shadow-md">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center gap-3">
                        <h2 class="text-lg font-bold text-white tracking-wide">Saved Collection</h2>
                        <span class="flex items-center justify-center px-2.5 py-0.5 rounded-full bg-zinc-800 border border-zinc-700 text-amber-400 text-xs font-bold shadow-sm">
                            {{ number_format($wallpapers->total()) }}
                        </span>
                    </div>
                </div>
            </div>
        @endif

        {{-- Main Content Section --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            @if($wallpapers->total() > 0)
                <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                    @foreach($wallpapers as $wallpaper)
                        <div class="break-inside-avoid mb-6">
                            <x-wallpaper-card :wallpaper="$wallpaper" />
                        </div>
                    @endforeach
                </div>

                @if($wallpapers->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $wallpapers->links('components.pagination') }}
                    </div>
                @endif

            @else
                <div class="col-span-full py-24 px-4 text-center bg-zinc-900/40 rounded-2xl border border-zinc-700/50 border-dashed max-w-4xl mx-auto mt-8">
                    <div class="relative mb-6 group inline-block">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center shadow-inner mx-auto group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-10 h-10 sm:w-12 sm:h-12 text-zinc-500 group-hover:text-amber-400 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl sm:text-3xl font-bold text-white mb-3 tracking-wide">No favorites found</h2>
                    <p class="text-gray-400 max-w-md mx-auto text-sm sm:text-base mb-8">
                        It looks like you haven't added any wallpapers to your favorites yet. Click the <span class="text-amber-400 font-bold">heart button</span> on any wallpaper you like.
                    </p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-amber-400 hover:bg-orange-400 text-black font-medium rounded-lg transition-colors shadow-lg shadow-amber-900/20">
                        Explore Wallpapers
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </main>

    <x-footer />
</body>
</html>