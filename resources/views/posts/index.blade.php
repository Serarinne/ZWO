<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>News & Articles | {{ env('APP_NAME') }} Blog</title>

    <link rel="canonical" href="{{ route('posts.index') }}" />
    <meta name="description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team. Discover new Zenless Zone Zero wallpaper collections, agent spotlights, faction features, and community highlights.">
    <meta name="keywords" content="zzz blog, zenless zone zero news, zzz updates, wallpaper collections, agent spotlight, faction guide">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="News & Articles | {{ env('APP_NAME') }} Blog" />
    <meta property="og:description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team about Zenless Zone Zero." />
    <meta property="og:url" content="{{ route('posts.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="News & Articles | {{ env('APP_NAME') }} Blog" />
    <meta name="twitter:description" content="Read the latest news, updates, and articles from the {{ env('APP_NAME') }} team about Zenless Zone Zero." />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Blog",
        "name": "{{ env('APP_NAME') }} Blog",
        "description": "News and articles about Zenless Zone Zero wallpapers, agents, factions, and artists.",
        "url": "{{ route('posts.index') }}",
        "publisher": {
            "@@type": "Organization",
            "name": "{{ env('APP_NAME') }}",
            "logo": {
                "@@type": "ImageObject",
                "url": "https://storage.ntewallpapers.com/assets/android-icon-192x192.png"
            }
        }
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden">

        <div class="relative bg-zinc-900 border-b border-zinc-800 py-16 sm:py-24">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 via-transparent to-orange-500/10"></div>
            <div class="absolute inset-0 opacity-5"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-4 tracking-tight">
                    News & Articles
                </h1>
                <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">
                    Stay updated with the latest Zenless Zone Zero news, wallpaper collections, agent spotlights, faction features, and community highlights.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <div class="col-span-full py-20 text-center bg-zinc-900/40 rounded-2xl border border-zinc-700/50 border-dashed">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-zinc-800 mb-4 text-zinc-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 00-2-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <div class="text-lg font-medium text-white tracking-wide">No articles yet</div>
                        <p class="text-gray-400 mt-2">Check back later for news and updates.</p>
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $posts->links('components.pagination') }}
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
</body>
</html>