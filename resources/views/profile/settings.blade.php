<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="canonical" href="{{ route('settings.edit') }}" />
    
    <title>Content Preferences - {{ env('APP_NAME') }}</title>
    <x-file-assets />
    
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
<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">
    
    <x-navigation />

    <main class="flex-grow">
        {{-- Hero Header --}}
        <div class="relative bg-zinc-900 border-b border-zinc-800 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/20 to-zinc-900 opacity-50 blur-3xl scale-110"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-zinc-900/60 to-transparent"></div>
            </div>

            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 relative z-10">
                
                {{-- Breadcrumb --}}
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-8 font-medium">
                    <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors">Home</a>
                    <span>&bull;</span>
                    <span class="text-amber-400">Content Preferences</span>
                </div>

                <div class="flex flex-col md:flex-row items-center md:items-start gap-6 md:gap-8">
                    {{-- Icon --}}
                    <div class="flex-shrink-0 relative group">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden border-4 border-zinc-800 shadow-2xl relative z-10 bg-gradient-to-br from-amber-500/20 to-amber-500/5 flex items-center justify-center">
                            <svg class="w-10 h-10 md:w-12 md:h-12 text-amber-400 drop-shadow-[0_0_10px_rgba(251,191,36,0.45)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-amber-500 blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 -z-10 rounded-full"></div>
                    </div>

                    {{-- Text Content --}}
                    <div class="flex-grow text-center md:text-left pt-1">
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-4">
                            Content Preferences
                        </h1>
                        <p class="text-gray-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto md:mx-0">
                            Customize your ZZZ wallpaper browsing experience by selecting which content ratings you'd like to see. Your preferences will apply across your browsing sessions.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form & Content Section --}}
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-10 max-w-5xl">
            
            {{-- Alerts --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-8 p-4 rounded-xl bg-emerald-900/30 border border-emerald-700/50 text-emerald-400 flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-900/50 flex items-center justify-center flex-shrink-0 border border-emerald-700/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" type="button" class="text-emerald-500 hover:text-emerald-300 transition-colors p-1.5 rounded-lg hover:bg-emerald-900/50 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif

            @if(session('warning'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mb-8 p-4 rounded-xl bg-amber-900/30 border border-amber-700/50 text-amber-400 flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-amber-900/50 flex items-center justify-center flex-shrink-0 border border-amber-700/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <span class="text-sm font-medium">{{ session('warning') }}</span>
                    </div>
                    <button @click="show = false" type="button" class="text-amber-500 hover:text-amber-300 transition-colors p-1.5 rounded-lg hover:bg-amber-900/50 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-5 rounded-xl bg-rose-900/30 border border-rose-700/50 text-rose-400 shadow-lg">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 rounded-full bg-rose-900/50 flex items-center justify-center flex-shrink-0 border border-rose-700/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-sm font-bold text-rose-300">Please correct the following errors:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm space-y-1 pl-11 text-rose-300/80">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('settings.update') }}" method="POST" class="w-full">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <h2 class="text-lg font-bold text-white mb-2">Image Ratings allowed</h2>
                    <p class="text-sm text-gray-400">Select the type of content you want to see when browsing wallpapers.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mb-10">
                    @php
                        $availableRatings = [
                            'general' => [
                                'title' => 'General',
                                'desc' => 'All ages. Safe for work and public environments.',
                                'icon' => 'M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z'
                            ],
                            'sensitive' => [
                                'title' => 'Sensitive',
                                'desc' => 'Light content. May contain mildly provocative material.',
                                'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z'
                            ],
                            'questionable' => [
                                'title' => 'Questionable',
                                'desc' => 'Suggestive content. Leans towards ecchi or minimal clothing.',
                                'icon' => 'M9.17 16l3.33-3.33 1.41 1.41L9.17 16zM21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-7a7 7 0 00-7 7 7 7 0 007 7 7 7 0 007-7 7 7 0 00-7-7zm0 10a1 1 0 110-2 1 1 0 010 2z'
                            ],
                            'explicit' => [
                                'title' => 'Explicit',
                                'desc' => 'Explicit adult content (NSFW). No safe content restrictions.',
                                'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z'
                            ]
                        ];
                    @endphp

                    @foreach($availableRatings as $value => $info)
                        <label class="flex items-start gap-4 p-5 rounded-xl bg-zinc-800 border border-zinc-700 hover:bg-zinc-700 hover:border-amber-500/50 cursor-pointer transition-all group relative focus-within:ring-2 focus-within:ring-amber-500/50 focus-within:border-transparent shadow-sm hover:shadow-md">
                            <div class="flex items-center mt-0.5 flex-shrink-0">
                                <input
                                    type="checkbox"
                                    name="allowed_ratings[]"
                                    value="{{ $value }}"
                                    @if(in_array($value, old('allowed_ratings', auth()->user()->allowed_ratings ?? []))) checked @endif
                                    class="w-5 h-5 rounded text-amber-500 bg-zinc-900 border-zinc-600 focus:ring-amber-500 focus:ring-offset-zinc-800 accent-amber-500 cursor-pointer transition-colors"
                                />
                            </div>
                            <div class="flex-grow">
                                <div class="flex items-center gap-2.5 mb-1.5">
                                    <svg class="w-5 h-5 text-amber-400 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $info['icon'] }}"></path>
                                    </svg>
                                    <span class="font-bold text-white text-lg tracking-tight">
                                        {{ $info['title'] }}
                                    </span>
                                </div>
                                <span class="text-sm font-medium text-gray-400 block leading-relaxed">
                                    {{ $info['desc'] }}
                                </span>
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="pt-6 border-t border-zinc-800 flex flex-col-reverse sm:flex-row items-center justify-end gap-4">
                    <a href="{{ route('home') }}" class="w-full sm:w-auto px-6 py-3 text-sm font-medium text-gray-400 hover:text-white bg-transparent hover:bg-zinc-800 rounded-lg transition-colors text-center focus:outline-none focus:ring-2 focus:ring-zinc-600">
                        Cancel
                    </a>
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-zinc-800 hover:bg-zinc-700 border border-zinc-700 hover:border-amber-500/50 text-white text-sm font-medium rounded-lg transition-all shadow-sm hover:shadow-amber-500/10 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-zinc-900 group">
                        <svg class="w-4 h-4 text-amber-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Save Preferences
                    </button>
                </div>
            </form>
            
        </div>
    </main>

    <x-footer />
</body>
</html>