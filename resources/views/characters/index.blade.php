<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>List of All Agents - {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('characters.index') }}" />

    <meta name="description"
        content="Browse the complete ZZZ agents list. Discover high-quality Zenless Zone Zero character wallpapers featuring Anby, Nicole, Billy, Ellen, Nekomata, and more.">
    <meta name="keywords"
        content="zzz agents, zenless zone zero agents, zzz wallpaper agents, anby zzz wallpaper, nicole zzz wallpaper, billy zzz wallpaper, ellen zzz wallpaper, nekomata zzz wallpaper, zzz wallpaper">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title"
        content="List of All Agents - {{ env('APP_NAME') }}" />
    <meta property="og:description"
        content="Browse the complete ZZZ agents list. Discover high-quality Zenless Zone Zero character wallpapers featuring Anby, Nicole, Billy, Ellen, Nekomata, and more." />
    <meta property="og:url" content="{{ route('characters.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title"
        content="List of All Agents - {{ env('APP_NAME') }}" />
    <meta name="twitter:description"
        content="Browse the complete ZZZ agents list. Discover high-quality Zenless Zone Zero character wallpapers featuring Anby, Nicole, Billy, Ellen, Nekomata, and more." />
    <meta name="twitter:url" content="{{ route('characters.index') }}" />

    @include('components.file-assets')

    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "CollectionPage",
      "@@id": "{{ route('characters.index') }}#webpage",
      "url": "{{ route('characters.index') }}",
      "name": "List of All Agents - {{ env('APP_NAME') }}",
      "description": "Browse ZZZ agents and discover Zenless Zone Zero character wallpapers, profiles, and related artwork.",
      "isPartOf": {
        "@@id": "{{ route('home') }}#website"
      },
      "about": [
        {
          "@@type": "Thing",
          "name": "ZZZ Agents"
        },
        {
          "@@type": "Thing",
          "name": "ZZZ Agents Wallpaper"
        },
        {
          "@@type": "Thing",
          "name": "Zenless Zone Zero Agents"
        },
        {
          "@@type": "Thing",
          "name": "Zenless Zone Zero Agents Wallpaper"
        }
      ],
      "inLanguage": "en"
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ route('characters.index') }}#breadcrumb",
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
          "name": "Agents",
          "item": "{{ route('characters.index') }}"
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
            class="absolute top-0 left-1/4 w-[600px] h-[600px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-[600px] h-[600px] bg-orange-500/10 blur-[120px] rounded-full pointer-events-none -z-10">
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="text-center mb-12">
                <h1
                    class="text-3xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-4 tracking-tight">
                    ZZZ Agents
                </h1>
                
                <p class="text-gray-400 text-lg mb-8 max-w-3xl mx-auto">
                    Browse our complete directory of ZZZ agents and discover stunning <strong>Zenless Zone Zero wallpapers</strong>. Find high-quality 4K backgrounds featuring your favorites.
                </p>

                <div class="max-w-xl mx-auto">
                    <form action="{{ route('characters.index') }}" method="GET" class="relative group">
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
                            <input type="text" name="q" value="{{ request('q') }}"
                                class="block w-full p-4 pl-12 text-sm text-gray-100 bg-transparent border border-zinc-700 rounded-lg focus:ring-0 focus:border-transparent placeholder-gray-500"
                                placeholder="Search for agent or faction..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div id="character-grid"
                class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">

                @forelse($characters as $character)
                    <x-character-card :character="$character" />
                @empty
                    <div
                        class="col-span-full py-20 text-center bg-zinc-900/40 rounded-2xl border border-zinc-700/50 border-dashed">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-zinc-800 mb-4 text-zinc-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="text-lg font-medium text-white tracking-wide">No agents found</div>
                        <p class="text-gray-400 mt-1">Try searching for something else.</p>
                        @if (request('q'))
                            <a href="{{ route('characters.index') }}"
                                class="mt-4 inline-block text-amber-400 hover:text-orange-400 hover:underline">Clear
                                Search</a>
                        @endif
                    </div>
                @endforelse

            </div>

            @if ($characters->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $characters->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>

</html>