<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} | Zenless Zone Zero Wallpaper 4K & HD</title>
    <link rel="canonical" href="{{ route('home') }}" />
    <meta name="description"
        content="Download ZZZ wallpaper in HD and 4K for phone and PC. Explore Zenless Zone Zero wallpapers, zzz backgrounds, and fanart featuring Anby, Nicole, Billy, Nekomata, and Ellen.">
    <meta name="keywords"
        content="zzz wallpaper, zenless zone zero wallpaper, zzz wallpapers, zenless zone zero wallpapers, zzz wallpaper 4k, zenless zone zero 4k wallpaper, wallpaper zzz, zzz 壁紙, zzz background">
    <meta name="robots" content="index, follow">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ env('APP_NAME') }} - Zenless Zone Zero Wallpaper 4K & HD">
    <meta property="og:description"
        content="Download HD and 4K Zenless Zone Zero wallpapers for phone and PC. Browse the latest ZZZ wallpapers and backgrounds.">
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@graph": [
        {
        "@@type": "WebSite",
        "@@id": "{{ route('home') }}#website",
        "url": "{{ route('home') }}",
        "name": "{{ env('APP_NAME') }}",
        "description": "ZZZ wallpaper and Zenless Zone Zero wallpaper collection in HD and 4K for phone and PC.",
        "potentialAction": {
            "@@type": "SearchAction",
            "target": "{{ route('wallpapers.search') }}?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
        },
        {
        "@@type": "Organization",
        "@@id": "{{ route('home') }}#organization",
        "name": "{{ env('APP_NAME') }}",
        "url": "{{ route('home') }}",
        "logo": {
            "@@type": "ImageObject",
            "url": "https://storage.zzzwallpapers.com/assets/logo.png"
        }
        },
        {
        "@@type": "CollectionPage",
        "@@id": "{{ route('home') }}#webpage",
        "url": "{{ route('home') }}",
        "name": "{{ env('APP_NAME') }} - Zenless Zone Zero Wallpaper 4K & HD",
        "isPartOf": {
            "@@id": "{{ route('home') }}#website"
        },
        "about": [
            { "@@type": "Thing", "name": "ZZZ Wallpaper" },
            { "@@type": "Thing", "name": "Zenless Zone Zero Wallpaper" },
            { "@@type": "Thing", "name": "Zenless Zone Zero Wallpaper 4K" }
        ],
        "description": "Browse ZZZ wallpapers and Zenless Zone Zero wallpapers in HD and 4K for desktop and phone.",
        "inLanguage": "en"
        }
    ]
    }
    </script>

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

<body
    class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-yellow-400 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow">
        @if ($latestWallpapers->currentPage() == 1)
            <div class="relative bg-zinc-900 py-20 lg:py-32 overflow-hidden border-b border-zinc-800">
                <div class="absolute inset-0">
                    <div class="absolute inset-0 opacity-5"></div>
                    <!-- Ambient glow diubah ke warna kuning dan hijau neon khas ZZZ -->
                    <div class="absolute top-0 left-1/4 w-96 h-96 bg-yellow-500/20 rounded-full blur-[128px]"></div>
                    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-zinc-500/20 rounded-full blur-[128px]"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-zinc-950"></div>
                </div>

                <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight mb-6 italic">
                        Discover the Best <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">
                            ZZZ Wallpaper
                        </span>
                    </h1>
                    
                    <p class="text-lg md:text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
                        Find the perfect high-quality HD & 4K ZZZ wallpaper for your devices. Search through our stunning <strong>Zenless Zone Zero</strong> collection featuring your favorite proxies and agents like Anby, Nicole, Billy, Nekomata, and Ellen today.
                    </p>

                    <div class="max-w-2xl mx-auto">
                        <form action="{{ route('wallpapers.search') }}" method="GET" class="relative group">
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-200">
                            </div>
                            <div
                                class="relative flex items-center bg-zinc-900 rounded-xl border border-zinc-700 shadow-2xl">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="text" name="q"
                                    class="block w-full p-4 pl-12 text-base text-white bg-transparent border-none rounded-xl focus:ring-0 placeholder-gray-500 focus:outline-none"
                                    placeholder="Search agent, faction, or vibe..." required>
                                <button type="submit"
                                    class="absolute right-2.5 bottom-2.5 bg-yellow-500 hover:bg-yellow-400 text-black font-bold tracking-wider rounded-lg text-sm px-5 py-2 transition-colors">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if ($latestWallpapers->currentPage() == 1)
                <section class="mb-16">
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-white flex items-center gap-2 tracking-wide">
                                <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                Trending Tags
                            </h2>
                        </div>
                        <a href="{{ route('tags.index') }}"
                            class="text-sm text-yellow-400 hover:text-yellow-300 font-bold transition-colors">View All
                            Tags &rarr;</a>
                    </div>

                    <div class="flex gap-4 overflow-x-auto no-scrollbar pb-4 mask-image-right">
                        @foreach ($trendingTags as $tag)
                            <a href="{{ route('tags.view', $tag->slug) }}"
                                class="flex-shrink-0 group relative overflow-hidden rounded-xl bg-zinc-800 border border-zinc-700 hover:border-yellow-400/50 transition-all duration-300 w-40 h-24">
                                <img src="{{ $tag->image['webp'] }}"
                                    class="absolute inset-0 w-full h-full object-cover opacity-40 group-hover:scale-110 group-hover:opacity-60 transition-all duration-500"
                                    alt="{{ $tag->name }} ZZZ wallpaper" loading="lazy" decoding="async">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-900/40 to-transparent">
                                </div>
                                <div class="absolute bottom-0 left-0 p-3">
                                    <span
                                        class="block text-white font-bold text-sm tracking-wide group-hover:text-yellow-400 transition-colors">{{ $tag->name }}</span>
                                    <span class="block text-[10px] text-gray-400">{{ $tag->wallpapers_count ?? 0 }}
                                        wallpapers</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>

                <section class="mb-16">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-white flex items-center gap-2 tracking-wide">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            Popular This Week
                        </h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-6 gap-6">
                        @foreach ($popularWallpapers ?? [] as $wallpaper)
                            <a href="{{ route('wallpapers.view', $wallpaper) }}"
                                class="group relative block rounded-lg overflow-hidden shadow-lg border border-zinc-800 hover:border-yellow-400/50 transition-colors aspect-[2/3]">
                                @if ($wallpaper->thumbnail)
                                    <picture>
                                        <source srcset="{{ $wallpaper->thumbnail['webp'] }}" type="image/webp">
                                        <source srcset="{{ $wallpaper->thumbnail['jpg'] }}" type="image/jpeg">
                                        <img src="{{ $wallpaper->thumbnail['webp'] }}"
                                            alt="{{ $wallpaper->seo_title ?? 'ZZZ wallpaper 4K' }}"
                                            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300"
                                            loading="lazy" decoding="async">
                                    </picture>
                                @else
                                    <img src="{{ $wallpaper->thumbnail['webp'] }}"
                                        alt="{{ $wallpaper->seo_title ?? 'Popular ZZZ wallpaper' }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-4 text-white w-full">
                                    <div class="font-bold text-sm truncate tracking-wide group-hover:text-yellow-400 transition-colors">
                                        {{ $wallpaper->characters->first()->name ?? $wallpaper->seo_title }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <section id="latest">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-2 tracking-wide">
                        @if ($latestWallpapers->currentPage() == 1)
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Newest Wallpapers
                        @else
                            <span class="text-yellow-500 text-lg">Page {{ $latestWallpapers->currentPage() }}</span>
                        @endif
                    </h2>
                </div>

                @if (isset($latestWallpapers) && $latestWallpapers->count() > 0)
                    <div class="columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-6 space-y-6">
                        @foreach ($latestWallpapers as $wallpaper)
                            <div class="break-inside-avoid mb-6">
                                <x-wallpaper-card :wallpaper="$wallpaper" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div
                        class="w-full py-20 flex flex-col items-center justify-center text-center bg-zinc-900/50 rounded-2xl border border-zinc-800 border-dashed">
                        <svg class="w-16 h-16 text-zinc-600 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <div class="text-xl font-bold text-zinc-300 mb-2 tracking-wide">No Wallpaper Found</div>
                        <p class="text-zinc-500 max-w-sm">We couldn't find any wallpaper at the moment. Please check
                            back later.</p>
                    </div>
                @endif

                @if (isset($latestWallpapers) && method_exists($latestWallpapers, 'links'))
                    <div class="mt-12 flex justify-center">
                        {{ $latestWallpapers->links('components.pagination') }}
                    </div>
                @endif
            </section>
        </div>
    </main>

    @include('components.footer')
</body>

</html>