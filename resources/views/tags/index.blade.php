<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Wallpaper Tags & Categories - {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('tags.index') }}" />

    <meta name="description"
        content="Explore our extensive ZZZ wallpaper tags directory. Find the perfect Zenless Zone Zero wallpapers and 4K backgrounds by categories like outfits, factions, styles, and themes.">
    <meta name="keywords"
        content="zzz wallpaper tags, zzz wallpapers, zenless zone zero wallpaper 4k, zzz background, wallpaper zzz, zenless zone zero themes, zzz anime wallpapers">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Wallpaper Tags & Categories - {{ env('APP_NAME') }}" />
    <meta property="og:description"
        content="Explore our extensive ZZZ wallpaper tags directory. Find the perfect Zenless Zone Zero wallpapers and 4K backgrounds by categories like outfits, factions, styles, and themes." />
    <meta property="og:url" content="{{ route('tags.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Wallpaper Tags & Categories - {{ env('APP_NAME') }}" />
    <meta name="twitter:description"
        content="Explore our extensive ZZZ wallpaper tags directory. Find the perfect Zenless Zone Zero wallpapers and 4K backgrounds by categories like outfits, factions, styles, and themes." />
    <meta name="twitter:url" content="{{ route('tags.index') }}" />

    @include('components.file-assets')

    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "CollectionPage",
      "@@id": "{{ route('tags.index') }}#webpage",
      "url": "{{ route('tags.index') }}",
      "name": "ZZZ Wallpaper Tags - Zenless Zone Zero Tag Directory",
      "description": "Browse ZZZ wallpaper tags and explore Zenless Zone Zero wallpaper categories, themes, and backgrounds.",
      "isPartOf": {
        "@@id": "{{ route('home') }}#website"
      },
      "about": [
        {
          "@@type": "Thing",
          "name": "ZZZ Wallpaper Tags"
        },
        {
          "@@type": "Thing",
          "name": "Zenless Zone Zero Wallpaper Tags"
        },
        {
          "@@type": "Thing",
          "name": "Wallpaper Categories"
        }
      ],
      "inLanguage": "en"
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ route('tags.index') }}#breadcrumb",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ route('home') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Tags",
          "item": "{{ route('tags.index') }}"
        }
      ]
    }
  ]
}
</script>
</head>

<body
    class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <h1
                    class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-4 tracking-tight">
                    Wallpaper Tags
                </h1>
                <p class="text-gray-400 text-lg mb-8">
                    Browse our comprehensive directory of <strong>ZZZ wallpaper tags</strong>. Filter your search to find the perfect <strong>Zenless Zone Zero wallpaper 4K</strong> based on specific themes, styles, outfits, factions, or visual features.
                </p>

                <div class="max-w-xl mx-auto">
                    <form action="{{ route('tags.index') }}" method="GET" class="relative group">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 to-orange-500 rounded-lg blur opacity-30 group-hover:opacity-70 transition duration-200">
                        </div>
                        <div class="relative flex items-center bg-zinc-900 rounded-lg">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" name="query" value="{{ request('query') }}"
                                class="block w-full p-4 pl-12 text-sm text-gray-100 bg-transparent border border-zinc-700 rounded-lg focus:ring-0 focus:border-transparent placeholder-gray-500"
                                placeholder="Search tags (e.g. Hollow, Streetwear, Faction, Neon)..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">

                @forelse($tags as $tag)
                    <div
                        class="group relative rounded-xl overflow-hidden bg-zinc-900 border border-zinc-800 shadow-md hover:shadow-2xl hover:shadow-amber-500/10 hover:border-amber-500/30 transition-all duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('tags.view', $tag->slug) }}" class="block w-full h-full">

                            <div class="aspect-[1/1] w-full overflow-hidden bg-zinc-800 relative">
                                <picture>
                                    <source srcset="{{ $tag->image['webp'] }}" type="image/webp">
                                    <source srcset="{{ $tag->image['jpg'] }}" type="image/jpeg">
                                    <img src="{{ $tag->image['webp'] }}"
                                        alt="{{ $tag->seo_title }}" width="300"
                                        height="300"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        loading="lazy">
                                </picture>

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                                </div>
                            </div>

                            <div
                                class="absolute bottom-0 left-0 right-0 p-3 transform translate-y-1 group-hover:translate-y-0 transition-transform duration-300">
                                <div
                                    class="font-bold text-white text-sm md:text-base truncate text-center group-hover:text-amber-400 transition-colors tracking-wide">
                                    {{ $tag->name }}
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 text-center bg-zinc-900/40 rounded-2xl border border-zinc-700/50 border-dashed">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-zinc-800 mb-4 text-zinc-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-lg font-medium text-white tracking-wide">No tags found</div>
                        <p class="text-gray-400 mt-1">We couldn't find any tags matching
                            "<strong>{{ request('query') }}</strong>".</p>
                        @if (request('query'))
                            <a href="{{ route('tags.index') }}"
                                class="mt-4 inline-block text-amber-400 hover:text-orange-400 hover:underline">View all
                                tags</a>
                        @endif
                    </div>
                @endforelse

            </div>

            @if ($tags->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $tags->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>

</html>