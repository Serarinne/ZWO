@props(['character'])

@if ($character->series->isNotEmpty())
    <article class="group relative rounded-2xl overflow-hidden bg-zinc-900 shadow-lg hover:shadow-[0_0_28px_-6px_rgba(251,191,36,0.28)] hover:-translate-y-1.5 transition-all duration-300 border border-zinc-800 hover:border-amber-500/50">
        <a href="{{ route('characters.view', ['slug' => $character]) }}" class="block w-full h-full">
            
            {{-- Floating Badge for Total Wallpapers --}}
            <div class="absolute top-3 right-3 z-20">
                <div class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg bg-black/60 backdrop-blur-md border border-zinc-700/70 group-hover:border-amber-500/40 group-hover:bg-zinc-950/90 transition-all duration-300 shadow-lg">
                    <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-amber-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-xs font-bold text-gray-300 group-hover:text-white transition-colors duration-300">
                        {{ $character->wallpapers_count }}
                    </span>
                </div>
            </div>

            <div class="aspect-[3/4] w-full overflow-hidden bg-black relative">
                <picture>
                    <source srcset="{{ $character->image['webp'] }}" type="image/webp">
                    <source srcset="{{ $character->image['jpg'] }}" type="image/jpeg">
                    <img src="{{ $character->image['webp'] }}" alt="{{ $character->name }}" width="300" height="400" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" loading="lazy">
                </picture>
                
                <div class="absolute inset-0 bg-gradient-to-t from-black via-zinc-950/45 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-300"></div>
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-amber-400/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            {{-- Character Info --}}
            <div class="absolute bottom-0 left-0 right-0 p-5 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                <div class="flex items-center justify-between gap-3">
                    <div class="min-w-0">
                        <div class="text-[10px] uppercase tracking-[0.2em] text-amber-400/80 mb-1 font-semibold">
                            Agent Profile
                        </div>
                        <div class="font-extrabold text-white text-base md:text-lg truncate leading-tight group-hover:text-amber-400 transition-colors drop-shadow-md uppercase tracking-wide">
                            {{ $character->name }}
                        </div>
                    </div>
                    
                    <div class="shrink-0 opacity-0 transform -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">
                        <div class="bg-amber-500/15 border border-amber-500/20 p-1.5 rounded-md">
                            <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
        </a>
    </article>
@endif