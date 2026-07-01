<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Articles in {{ $category->name ?? 'Review' }} | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="description" content="Find the latest news, updates, and articles about {{ $category->name ?? 'Review' }} on the {{ env('APP_NAME') }} blog. Explore posts in this category.">
    <meta name="keywords" content="zzz wallpapers, {{ $category->name ?? 'review' }}, zzz blog category, zenless zone zero news, zzz updates">

    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Articles in {{ $category->name ?? 'Review' }}" />
    <meta property="og:description" content="Browse articles in the {{ $category->name ?? 'Review' }} category." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Articles in {{ $category->name ?? 'Review' }}" />

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "CollectionPage",
        "name": "{{ $category->name ?? 'Review' }} Articles",
        "url": "{{ url()->current() }}",
        "breadcrumb": {
            "@@type": "BreadcrumbList",
            "itemListElement": [{
                "@@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "{{ route('home') }}"
            }, {
                "@@type": "ListItem",
                "position": 2,
                "name": "Blog",
                "item": "{{ route('posts.index') }}"
            }, {
                "@@type": "ListItem",
                "position": 3,
                "name": "{{ $category->name ?? 'Review' }}",
                "item": "{{ url()->current() }}"
            }]
        }
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow">

        <div class="relative bg-zinc-900 border-b border-zinc-800 py-12 md:py-16">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 to-orange-500/10"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#f59e0b 1px, transparent 1px); background-size: 30px 30px;"></div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col items-center text-center">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/20 mb-4 tracking-wider">
                        Category Archive
                    </span>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-2 tracking-tight">
                        {{ $category->name ?? 'Review' }}
                    </h1>
                    <p class="text-gray-400 max-w-2xl text-lg">
                        Explore all articles, news, and updates related to {{ strtolower($category->name ?? 'Review') }}.
                    </p>
                </div>
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
                        <div class="text-lg font-medium text-white tracking-wide">No articles found</div>
                        <p class="text-gray-400 mt-2">There are no posts in this category yet.</p>
                        <a href="{{ route('posts.index') }}" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-black bg-amber-400 hover:bg-orange-400 transition-colors">
                            Back to Blog
                        </a>
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