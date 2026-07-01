<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $wallpaper->seo_title }} | {{ env('APP_NAME') }}</title>
    
    <link rel="canonical" href="{{ route('wallpapers.view', $wallpaper->slug) }}" />
    <meta name="description" content="{{ $wallpaper->seo_description }}">
    <meta name="keywords" content="{{ $wallpaper->seo_keywords }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    
    <meta property="og:title" content="{{ $wallpaper->seo_title }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ $wallpaper->seo_description }}" />
    <meta property="og:url" content="{{ route('wallpapers.view', $wallpaper->slug) }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    
    @if(!$wallpaper->is_video)
        <meta property="og:image" content="{{ $wallpaper->original }}" />
        <meta property="og:image:width" content="{{ $wallpaper->width }}" />
        <meta property="og:image:height" content="{{ $wallpaper->height }}" />
        <meta property="og:image:type" content="{{ $wallpaper->file_type }}" />
        <meta name="twitter:image" content="{{ $wallpaper->original }}" />
    @else
        <meta property="og:image" content="{{ $wallpaper->wallpaper_thumbnail_jpg }}" />
        <meta property="og:video" content="{{ $wallpaper->original }}" />
        <meta property="og:video:width" content="{{ $wallpaper->width }}" />
        <meta property="og:video:height" content="{{ $wallpaper->height }}" />
        <meta property="og:video:type" content="{{ $wallpaper->file_type }}" />
        <meta name="twitter:player" content="{{ $wallpaper->original }}" />
        <meta name="twitter:player:width" content="{{ $wallpaper->width }}">
        <meta name="twitter:player:height" content="{{ $wallpaper->height }}">
    @endif

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $wallpaper->seo_title }} | {{ env('APP_NAME') }}" />
    <meta name="twitter:description" content="{{ $wallpaper->seo_description }}" />
    <meta name="twitter:url" content="{{ route('wallpapers.view', $wallpaper->slug) }}" />

    @include('components.file-assets')

    @if(!$wallpaper->is_video)
        <link rel="preload" as="image" href="{{ $wallpaper->wallpaper_preview_webp }}" type="image/webp">
    @endif

    <style>
        [x-cloak] { display: none !important; }
        .ts-control { background-color: #18181b !important; border-color: #3f3f46 !important; color: #fff !important; }
        .ts-dropdown { background-color: #09090b !important; border-color: #3f3f46 !important; color: #fff !important; }
        .ts-dropdown .option:hover, .ts-dropdown .active { background-color: #27272a !important; color: #fbbf24 !important; }
        .ts-control input { color: #fff !important; }
        .ts-wrapper.multi .ts-control > div { background: #3f3f46; color: #fff; border-radius: 6px; }
    </style>

    <script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
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
        "name": "{{ $wallpaper->characters[0]->name }}",
        "item": "{{ route('characters.view', ['slug' => $wallpaper->characters[0]]) }}"
        },
        {
        "@@type": "ListItem",
        "position": 3,
        "name": "{{ $wallpaper->seo_title }}",
        "item": "{{ route('wallpapers.view', $wallpaper->slug) }}"
        }
    ]
    }
    </script>

    @if($wallpaper->is_video)
        <script type="application/ld+json">
        {
            "@@context": "https://schema.org", "@@type": "VideoObject",
            "name": "{{ $wallpaper->seo_title }}", "description": "{{ $wallpaper->seo_description }}",
            "thumbnailUrl": "{{ $wallpaper->wallpaper_thumbnail_jpg }}", "contentUrl": "{{ $wallpaper->original }}",
            "uploadDate": "{{ $wallpaper->created_at->toIso8601String() }}", "keywords": "{{ $wallpaper->seo_keywords }}",
            "width": {{ $wallpaper->width }}, "height": {{ $wallpaper->height }},
            @if($wallpaper->artists->isNotEmpty())
            "author": [ @foreach ($wallpaper->artists as $artist) { "@@type": "Person", "name": "{{ $artist->name }}" }{{ !$loop->last ? ',' : '' }} @endforeach ],
            @endif
            "potentialAction": { "@@type": "ViewAction", "target": "{{ route('wallpapers.view', $wallpaper->slug) }}" }
        }
        </script>
    @else
        <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@@type": "ImageObject",
        "@@id": "{{ route('wallpapers.view', $wallpaper->slug) }}#image",
        "name": "{{ $wallpaper->seo_title }}",
        "description": "{{ $wallpaper->seo_description }}",
        "url": "{{ route('wallpapers.view', $wallpaper->slug) }}",
        "contentUrl": "{{ $wallpaper->original }}",
        "thumbnailUrl": "{{ $wallpaper->wallpaper_thumbnail_jpg }}",
        "encodingFormat": "{{ $wallpaper->file_type }}",
        "width": {{ $wallpaper->width }},
        "height": {{ $wallpaper->height }},
        "keywords": "{{ $wallpaper->seo_keywords }}",
        "creditText": "{{ $wallpaper->artists->first()->name ?? env('APP_NAME') }}",
        "creator": {
            "@@type": "Person",
            "name": "{{ $wallpaper->artists->first()->name ?? env('APP_NAME') }}"
        },
        "datePublished": "{{ $wallpaper->created_at->toIso8601String() }}",
        "dateModified": "{{ $wallpaper->updated_at->toIso8601String() }}"
        @if(!empty($wallpaper->source)),
        "acquireLicensePage": "{{ $wallpaper->source }}"
        @endif
        }
        </script>
    @endif
</head>

<body class="bg-zinc-950 text-gray-200 font-sans selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="max-w-7xl mx-auto mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">{{ $wallpaper->seo_title }}</h1>
        </div>

        <div class="w-full mx-auto rounded-xl overflow-hidden shadow-2xl bg-zinc-900 border border-zinc-800">
            @if ($wallpaper->is_video)
                <video controls controlslist="nodownload" class="w-full rounded-xl max-h-[80vh]" preload="metadata">
                    <source src="{{ $wallpaper->preview['mp4'] }}" type="{{$wallpaper->file_type}}">
                    Your browser does not support the video.
                </video>
            @else
                <picture>
                    <source srcset="{{ $wallpaper->preview['webp'] }}" type="image/webp">
                    <source srcset="{{ $wallpaper->preview['jpg'] }}" type="image/jpeg">
                    <img src="{{ $wallpaper->preview['webp'] }}" alt="{{ $wallpaper->image_alt ? $wallpaper->image_alt : $wallpaper->seo_title }}" width="960" height="{{ $wallpaper->width > 0 ? round((($wallpaper->height/$wallpaper->width)*960),0) : 0 }}" class="w-full h-auto object-cover" fetchpriority="high" decoding="async">
                </picture>
            @endif
        </div>

        @if(!empty($wallpaper->image_description))
            <section class="max-w-7xl mx-auto mt-6">
                <div class="bg-zinc-900/60 border border-zinc-800 rounded-xl p-5 md:p-6">
                    <h2 class="text-xl font-semibold text-white mb-3 tracking-wide">Description</h2>
                    <div class="prose prose-invert max-w-none text-gray-300">
                        {!! nl2br(e($wallpaper->image_description)) !!}
                    </div>
                </div>
            </section>
        @endif

        <div class="max-w-7xl mx-auto mt-6 flex flex-col sm:flex-row gap-4" x-data="{ 
            isFavorited: {{ Auth::check() && Auth::user()->favoriteWallpapers()->where('wallpaper_id', $wallpaper->id)->exists() ? 'true' : 'false' }},
            count: {{ $wallpaper->favorites_count }},
            isLoading: false 
        }">
            <form action="{{ route('wallpapers.download', $wallpaper->id) }}" method="POST" class="flex-grow">
                @csrf

                <button type="submit"
                    class="w-full flex items-center justify-center gap-3 bg-amber-500 hover:bg-orange-500 text-black font-bold py-3 px-6 rounded-xl text-lg transition-colors tracking-wide">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span>Download</span>
                </button>
            </form>
            <div class="flex gap-4">
                @auth
                <button 
                    @click="isLoading = true;
                            fetch('{{ route('wallpapers.favorite', ['id' => $wallpaper->id]) }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                                    'Accept': 'application/json',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                isFavorited = data.is_favorited;
                                count = data.favorites_count;
                                isLoading = false;
                            });" 
                    :disabled="isLoading"
                    class="flex-grow flex items-center justify-center gap-2 font-bold py-3 px-6 rounded-xl transition-colors border border-zinc-700" 
                    :class="isFavorited ? 'bg-orange-500 text-black border-orange-400' : 'bg-zinc-800 hover:bg-zinc-700 text-white'">
                    <svg x-show="isFavorited" x-cloak class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    <svg x-show="!isFavorited" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 21.5l-7.682-7.682a4.5 4.5 0 010-6.364z"></path></svg>
                    <span x-text="isFavorited ? 'Favorited' : 'Favorite'"></span> (<span x-text="count"></span>)
                </button>
                @endauth
                @guest
                <a href="{{ route('login.index') }}" class="flex-grow flex items-center justify-center gap-2 font-bold py-3 px-6 rounded-xl transition-colors bg-zinc-800 hover:bg-zinc-700 border border-zinc-700">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.5l1.318-1.182a4.5 4.5 0 116.364 6.364L12 21.5l-7.682-7.682a4.5 4.5 0 010-6.364z"></path></svg>
                    <span>Favorite</span> (<span>{{ $wallpaper->favorites_count }}</span>)
                </a>
                @endguest
            </div>
        </div>

        <div class="max-w-7xl mx-auto mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                
                @if($wallpaper->tags->count())
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-white tracking-wide">Tags</h2>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($wallpaper->tags as $tag)
                        <a href="{{ route('tags.view', ['slug' => $tag]) }}" class="bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 text-sm font-medium px-4 py-1.5 rounded-full transition-colors hover:text-amber-300">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($wallpaper->characters->count())
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-white tracking-wide">Agents</h2>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($groupedCharacters as $character)
                            <div class="character-group">
                                <a href="{{ route('characters.view', ['slug' => $character->slug]) }}" 
                                   class="relative z-10 flex items-center gap-4 bg-zinc-900 hover:bg-zinc-800 p-3 rounded-xl border border-zinc-800 transition-colors {{ isset($character->sub_versions) && $character->sub_versions->count() > 0 ? 'ring-1 ring-amber-500/40' : '' }}">
                                    <picture>
                                        <source srcset="{{ $character->image['webp'] }}" type="image/webp">
                                        <source srcset="{{ $character->image['jpg'] }}" type="image/jpeg">
                                        <img src="{{ $character->image['webp'] }}" alt="{{ $character->name }}" class="w-12 h-12 rounded-full object-cover">
                                    </picture>
                                    
                                    <div>
                                        <p class="font-semibold text-white">{{ $character->name }}</p>
                                    </div>
                                </a>

                                @if(isset($character->sub_versions))
                                    @foreach($character->sub_versions as $child)
                                        <div class="relative">
                                            <div class="absolute -top-4 left-6 w-6 h-10 border-b-2 border-l-2 border-zinc-600 rounded-bl-lg pointer-events-none"></div>
                                            <a href="{{ route('characters.view', ['slug' => $child->slug]) }}" 
                                               class="ml-10 flex items-center gap-4 bg-zinc-900/80 hover:bg-zinc-800 p-2.5 rounded-xl border border-zinc-800 transition-colors group mt-2">
                                                <picture>
                                                    <source srcset="{{ $child->image['webp'] }}" type="image/webp">
                                                    <source srcset="{{ $child->image['jpg'] }}" type="image/jpeg">
                                                    <img src="{{ $child->image['webp'] }}" alt="{{ $child->name }}" 
                                                         class="w-10 h-10 rounded-full object-cover grayscale opacity-80 group-hover:grayscale-0 group-hover:opacity-100 transition-all">
                                                </picture>
                                                <div>
                                                    <p class="font-semibold text-gray-200 text-sm">{{ $child->name }}</p>
                                                    <p class="text-xs text-gray-500">Sub-character of {{ $character->name }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($wallpaper->artists->count())
                <div>
                    <h2 class="text-xl font-semibold text-white mb-4 tracking-wide">Artists</h2>
                    <div class="space-y-3">
                        @foreach($wallpaper->artists as $artist)
                        <a href="{{ route('artists.view', ['slug' => $artist]) }}" class="flex items-center gap-4 bg-zinc-900 hover:bg-zinc-800 p-3 rounded-xl border border-zinc-800 transition-colors">
                            <picture>
                                <source srcset="{{ $artist->image['webp'] }}" type="image/webp">
                                <source srcset="{{ $artist->image['jpg'] }}" type="image/jpeg">
                                <img src="{{ $artist->image['webp'] }}" alt="{{ $artist->name }}" class="w-12 h-12 rounded-full object-cover">
                            </picture>
                            <div>
                                <p class="font-semibold text-white">{{ $artist->name }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <aside class="lg:col-span-1 space-y-8">
                <div class="bg-zinc-900/60 border border-zinc-800 p-5 rounded-xl">
                    <div class="text-lg font-semibold text-white mb-4 tracking-wide">Information</div>
                    <dl class="text-sm space-y-4">
                        <div class="flex justify-between">
                            <dt class="text-gray-400">Views</dt>
                            <dd class="font-medium text-white flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-zinc-500">
                                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                    <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" />
                                </svg>
                                {{ number_format($wallpaper->views_count) }}
                            </dd>
                        </div>
                        <div class="flex justify-between"><dt class="text-gray-400">Uploaded</dt><dd>{{ $wallpaper->created_at->format('F d, Y') }}</dd></div>
                        <div class="flex justify-between"><dt class="text-gray-400">Resolution</dt><dd>{{ $wallpaper->width }} x {{ $wallpaper->height }}</dd></div>
                        <div class="flex justify-between"><dt class="text-gray-400">File Size</dt><dd>{{ $wallpaper->formatted_size }}</dd></div>
                        <div class="flex justify-between"><dt class="text-gray-400">Rating</dt><dd>{{ ucfirst($wallpaper->rating) }}</dd></div>
                        @if ($wallpaper->real_source)
                        <div class="flex justify-between items-start">
                            <dt class="text-gray-400 flex-shrink-0 mr-2">Source</dt>
                            <dd><a href="{{ $wallpaper->real_source }}" target="_blank" rel="noopener nofollow" class="text-amber-400 hover:text-orange-400 hover:underline break-all text-right">Link</a></dd>
                        </div>
                        @endif
                    </dl>
                </div>

                <div class="bg-zinc-900/60 border border-zinc-800 p-5 rounded-xl">
                    <div class="text-lg font-semibold text-white mb-4 tracking-wide">Share</div>
                    <div class="flex gap-2">
                        <a class="inline-flex flex-auto justify-center items-center p-3 rounded-lg text-white bg-zinc-800 hover:bg-[#1877F2]" target="_blank" rel="noopener" href="https://facebook.com/sharer/sharer.php?u={{ url()->current() }}" aria-label="Share on Facebook"><svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><title>Facebook</title><path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z"></path></svg></a>
                        <a class="inline-flex flex-auto justify-center items-center p-3 rounded-lg text-white bg-zinc-800 hover:bg-sky-500" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url={{ url()->current() }}&amp;text={{ urlencode($wallpaper->seo_title) }}" aria-label="Share on Twitter"><svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><title>Twitter</title><path d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z"></path></svg></a>
                        @if(!$wallpaper->is_video)
                        <a class="inline-flex flex-auto justify-center items-center p-3 rounded-lg text-white bg-zinc-800 hover:bg-red-600" target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&amp;media={{ $wallpaper->wallpaper_preview_jpg }}&amp;description={{ urlencode($wallpaper->seo_title) }}" aria-label="Share on Pinterest"><svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><title>Pinterest</title><path d="M268 6C165 6 64 75 64 186c0 70 40 110 64 110 9 0 15-28 15-35 0-10-24-30-24-68 0-81 62-138 141-138 68 0 118 39 118 110 0 53-21 153-90 153-25 0-46-18-46-44 0-38 26-74 26-113 0-67-94-55-94 25 0 17 2 36 10 51-14 60-42 148-42 209 0 19 3 38 4 57 4 3 2 3 7 1 51-69 49-82 72-173 12 24 44 36 69 36 106 0 154-103 154-196C448 71 362 6 268 6z"></path></svg></a>
                        @else
                        <a class="inline-flex flex-auto justify-center items-center p-3 rounded-lg text-white bg-zinc-800 hover:bg-red-600" target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button/?url={{ url()->current() }}&amp;media={{ $wallpaper->wallpaper_thumbnail_jpg }}&amp;description={{ urlencode($wallpaper->seo_title) }}" aria-label="Share on Pinterest"><svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6"><title>Pinterest</title><path d="M268 6C165 6 64 75 64 186c0 70 40 110 64 110 9 0 15-28 15-35 0-10-24-30-24-68 0-81 62-138 141-138 68 0 118 39 118 110 0 53-21 153-90 153-25 0-46-18-46-44 0-38 26-74 26-113 0-67-94-55-94 25 0 17 2 36 10 51-14 60-42 148-42 209 0 19 3 38 4 57 4 3 2 3 7 1 51-69 49-82 72-173 12 24 44 36 69 36 106 0 154-103 154-196C448 71 362 6 268 6z"></path></svg></a>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </main>

    @include('components.footer')
</body>
</html>