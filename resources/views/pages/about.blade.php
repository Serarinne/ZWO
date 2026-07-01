<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>About Us - {{ env('APP_NAME') }}</title>
    
    <meta name="title" content="About Us - {{ env('APP_NAME') }}">
    <meta name="description" content="Discover {{ env('APP_NAME') }}, the community hub for sharing and appreciating high-quality Zenless Zone Zero wallpapers and art. Join the collection today.">
    <meta name="keywords" content="zzz wallpapers, about zzz wallpapers, zenless zone zero wallpaper, zenless zone zero art, wallpaper community, high quality zzz wallpaper, game fanart gallery">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('about') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('about') }}">
    <meta property="og:title" content="About Us - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Discover {{ env('APP_NAME') }}, the community hub for sharing and appreciating high-quality Zenless Zone Zero wallpapers and art.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ route('about') }}">
    <meta name="twitter:title" content="About Us - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Discover {{ env('APP_NAME') }}, the community hub for sharing and appreciating high-quality Zenless Zone Zero wallpapers and art.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem",
            "position": 2,
            "name": "About Us",
            "item": "{{ route('about') }}"
        }]
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-amber-500/10 blur-[100px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 py-12 max-w-5xl">

            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-400 to-yellow-500 mb-4 tracking-tight drop-shadow-sm">
                    About {{ env('APP_NAME') }}
                </h1>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                    The community-driven hub for fans to discover, share, and appreciate high-quality Zenless Zone Zero wallpapers and art.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">

                <div class="md:col-span-2 bg-zinc-900/60 backdrop-blur-sm border border-zinc-700/50 rounded-2xl p-8 shadow-xl hover:border-amber-500/30 transition-all duration-300">
                    <h2 class="text-2xl font-semibold mb-4 text-white flex items-center">
                        <span class="bg-amber-500/10 text-amber-400 p-2 rounded-lg mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </span>
                        Our Mission
                    </h2>
                    <p class="text-gray-300 leading-relaxed">
                        <strong>{{ env('APP_NAME') }}</strong> was built from a simple passion: a love for Zenless Zone Zero and its bold urban fantasy style. We wanted to create a dedicated space where fans could discover, share, and appreciate high-quality ZZZ wallpapers without distractions. Our mission is to be a focused, community-driven hub for players and artists who love the energy of New Eridu, the style of its Agents, and the atmosphere surrounding its factions and Hollows.
                    </p>
                </div>

                <div class="bg-zinc-900/60 backdrop-blur-sm border border-zinc-700/50 rounded-2xl p-8 shadow-xl hover:border-orange-500/30 transition-all duration-300">
                    <h2 class="text-xl font-semibold mb-3 text-white">Our Vision</h2>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        We envision a platform that does more than collect images. It should also highlight the artists, styles, and creative interpretations that make the Zenless Zone Zero community so distinctive. Every wallpaper is part of a larger visual culture shaped by characters, city districts, factions, and fan creativity.
                    </p>
                </div>

                <div class="bg-zinc-900/60 backdrop-blur-sm border border-zinc-700/50 rounded-2xl p-8 shadow-xl hover:border-yellow-500/30 transition-all duration-300">
                    <h2 class="text-xl font-semibold mb-3 text-white">A Community Effort</h2>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        This platform is powered by <strong>you</strong>. Every upload helps the library grow, and every proper tag makes the archive easier to explore. By organizing wallpapers by Agents, factions, artists, and themes, you help build a collection that is cleaner, richer, and more useful for every fan browsing the world of ZZZ.
                    </p>
                </div>
            </div>

            @guest
                <div class="mt-12 text-center bg-gradient-to-r from-zinc-900 to-black rounded-2xl p-8 border border-zinc-700 relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold text-white mb-3 tracking-wide">Ready to Join?</h2>
                        <p class="text-gray-400 mb-6 max-w-lg mx-auto">
                            Whether you're here to find the perfect background or share a favorite piece of fan art, you're part of what makes {{ env('APP_NAME') }} grow.
                        </p>
                        <a href="{{ route('login.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold rounded-md text-black bg-amber-400 hover:bg-orange-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors shadow-lg shadow-amber-500/20">
                            Login to Account
                        </a>
                    </div>
                </div>
            @endguest

        </div>
    </main>

    @include('components.footer')
</body>
</html>