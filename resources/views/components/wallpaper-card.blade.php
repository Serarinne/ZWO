@props(['wallpaper'])

<div class="mb-4 break-inside-avoid group relative rounded-xl overflow-hidden bg-zinc-900 border border-zinc-800 shadow-md hover:shadow-2xl hover:shadow-amber-500/10 transition-all duration-300 hover:-translate-y-1">
    <a href="{{ route('wallpapers.view', $wallpaper) }}" class="block relative">
        
        <picture>
            <source srcset="{{ $wallpaper->thumbnail['webp'] }}" type="image/webp">
            <source srcset="{{ $wallpaper->thumbnail['jpg'] }}" type="image/jpeg">
            <img src="{{ $wallpaper->thumbnail['webp'] }}" 
                 alt="{{ $wallpaper->image_alt ? $wallpaper->image_alt : $wallpaper->seo_title }}" 
                 width="300" 
                 height="{{ $wallpaper->width > 0 ? round((($wallpaper->height/$wallpaper->width)*300),0) : 0 }}" 
                 loading="lazy" 
                 class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
        </picture>

        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-zinc-950/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4 z-10">
            <h3 class="text-white text-sm font-bold truncate drop-shadow-md uppercase tracking-wide">
                {{ $wallpaper->title }}
            </h3>
            <div class="flex items-center justify-between mt-1">
                <span class="text-xs text-gray-300 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ $wallpaper->views_count ?? 0 }}
                </span>
                <span class="text-amber-400 text-xs font-semibold uppercase tracking-wide">Open</span>
            </div>
        </div>

        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-amber-400/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

        @if ($wallpaper->is_video)
            <div class="absolute top-2 right-2 z-20 bg-black/70 backdrop-blur-sm text-amber-300 text-[10px] font-bold px-2 py-1 rounded-full flex items-center border border-amber-500/20 shadow-sm pointer-events-none uppercase tracking-wide">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3 mr-1">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                </svg>
                <span>Motion</span>
            </div>
        @endif

    </a>
</div>