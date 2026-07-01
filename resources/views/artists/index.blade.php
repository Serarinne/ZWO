<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Browse All Artists | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('artists.index') }}" />
    <meta name="description" content="Discover a comprehensive gallery of talented Zenless Zone Zero artists and creators. Browse through our complete list to find your favorite ZZZ artworks.">
    <meta name="keywords" content="zzz wallpapers, zzz artists, zenless zone zero creators, wallpaper creators, pixiv artists, game art gallery">
    <meta name="robots" content="index, follow, max-image-preview:large">

    {{-- Social Metadata --}}
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Browse All Artists | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="Discover a comprehensive gallery of talented Zenless Zone Zero artists and creators." />
    <meta property="og:url" content="{{ route('artists.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta name="twitter:card" content="summary_large_image" />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "CollectionPage",
        "name": "Artists List",
        "url": "{{ route('artists.index') }}",
        "breadcrumb": {
            "@@type": "BreadcrumbList",
            "itemListElement": [{
                "@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ route('home') }}"
            }, {
                "@@type": "ListItem", "position": 2, "name": "Artists", "item": "{{ route('artists.index') }}"
            }]
        }
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden">
        <div class="relative bg-zinc-900 pt-16 pb-12 sm:pt-24 sm:pb-16 border-b border-zinc-800">
             <div class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>
             <div class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-orange-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>
             <div class="absolute inset-0 opacity-5"></div>

             <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-6 tracking-tight">
                    Browse Artists
                </h1>
                <p class="text-gray-400 max-w-xl mx-auto mb-8">
                    Explore our curated list of talented illustrators capturing the stylish chaos of New Eridu and the world of Zenless Zone Zero. Click on an artist to view their complete wallpaper collection.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 max-w-7xl">
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @forelse($artists as $artist)
                    <div class="group relative bg-zinc-900 rounded-xl overflow-hidden border border-zinc-700 hover:border-amber-500/50 transition-all duration-300 shadow-lg hover:-translate-y-1">
                        <a href="{{ route('artists.view', $artist->slug) }}" class="block">
                            <div class="h-24 bg-zinc-800 overflow-hidden relative">
                                <img src="{{ $artist->image['webp'] }}" 
                                     alt="Banner for {{ $artist->name }}" 
                                     class="w-full h-full object-cover opacity-50 group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-zinc-900"></div>
                            </div>
                        </a>

                        <div class="px-4 pb-4 -mt-10 relative text-center">
                            <a href="{{ route('artists.view', $artist->slug) }}" class="block">
                                <div class="w-20 h-20 mx-auto rounded-full border-4 border-zinc-900 overflow-hidden shadow-md bg-zinc-800">
                                    <picture>
                                        <source srcset="{{ $artist->image['webp'] }}" type="image/webp">
                                        <img src="{{ $artist->image['jpg'] }}" 
                                             alt="{{ $artist->name }}" 
                                             class="w-full h-full object-cover">
                                    </picture>
                                </div>
                                
                                <div class="mt-3">
                                    <div class="text-lg font-bold text-white group-hover:text-amber-400 transition-colors truncate tracking-wide">
                                        {{ $artist->name }}
                                    </div>
                                </div>
                            </a>

                            <div class="flex justify-center gap-3 mt-3 pt-3 border-t border-zinc-700/50">
                                @foreach($artist->socials->take(2) as $social)
                                    @php $type = Str::lower($social->type); @endphp
                                    <a href="{{ $social->url }}" target="_blank" class="text-gray-500 hover:text-amber-400 transition-colors" title="{{ ucfirst($type) }}">
                                        @if($type === 'twitter' || $type === 'x')
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                                        @elseif($type === 'pixiv')
                                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 14.36c-1.32.72-2.76.72-3.6.36l-3.36-2.52-1.32 1.32c-.36.36-.72.6-1.2.6-.72 0-1.2-.48-1.2-1.2V9.36c0-.48.24-.84.6-1.08l6.36-4.56c.6-.48 1.44-.36 1.92.24.48.6.36 1.44-.24 1.92l-4.56 3.24 3.24 2.4c.84.6 2.16.6 3.36-.12.48-.36 1.08-.24 1.44.24.24.48.12 1.08-.36 1.44z"></path></svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                        @endif
                                    </a>
                                @endforeach
                                @if($artist->is_ai)
                                    <span class="text-zinc-500 text-[10px] font-bold tracking-wide">AI Models</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-zinc-800 mb-4 text-zinc-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-400 text-lg">No artists found in this directory.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 flex justify-center">
                {{ $artists->links('components.pagination') }}
            </div>

        </div>
    </main>

    @include('components.footer')

</body>
</html>