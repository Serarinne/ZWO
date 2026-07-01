<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download App - {{ env('APP_NAME') }}</title>
    <meta name="description" content="Download {{ env('APP_NAME') }} to access thousands of premium Zenless Zone Zero wallpapers with faster loading, offline favorites, and push notifications for new updates.">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:title" content="Download App - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Download {{ env('APP_NAME') }} to access thousands of premium Zenless Zone Zero wallpapers with faster loading, offline favorites, and push notifications for new updates.">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Download App - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Download {{ env('APP_NAME') }} to access thousands of premium Zenless Zone Zero wallpapers with faster loading, offline favorites, and push notifications for new updates.">

    <link rel="alternate" hreflang="en" href="{{ url()->current() }}">
    <x-file-assets />

    <script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "MobileApplication",
    "name": "{{ env('APP_NAME') }}",
    "operatingSystem": "Android",
    "applicationCategory": "LifestyleApplication",
    "description": "Download {{ env('APP_NAME') }} to access thousands of premium Zenless Zone Zero wallpapers with faster loading, offline favorites, and push notifications for new updates.",
    "offers": {
        "@@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
    },
    "downloadUrl": "https://play.google.com/store/apps/details?id=serarinne.ntewallpaper"
    }
    </script>
</head>
<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    <x-navigation />

    <main class="flex-grow flex items-center justify-center relative z-10 py-12 md:py-24">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-amber-500/10 blur-[100px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                {{-- Left Content: App Information & Download Buttons --}}
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 text-xs font-semibold border border-amber-500/20 tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        Mobile Application Available
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-none">
                        Bring <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">{{ env('APP_NAME') }}</span> to Your Device
                    </h1>
                    
                    <p class="text-gray-400 text-base sm:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Access thousands of premium Zenless Zone Zero wallpapers instantly. Enjoy faster loading, offline favorites, and push notifications for new wallpaper updates.
                    </p>

                    {{-- App Statistics/Badges --}}
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-6 pt-2 text-sm text-gray-300">
                        <div class="flex items-center gap-2">
                            <span class="text-white font-bold text-lg">4.9</span>
                            <div class="flex text-amber-400">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-gray-500">|</span>
                            <span>Rating on Play Store</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-white font-bold text-lg">100+</span>
                            <span class="text-gray-500">|</span>
                            <span>Active Downloads</span>
                        </div>
                    </div>

                    {{-- Download Buttons Container --}}
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                        <a href="https://play.google.com/store/apps/details?id=serarinne.ntewallpaper" target="_blank" rel="noopener noreferrer" 
                           class="inline-flex items-center gap-3 px-6 py-3 bg-black hover:bg-zinc-950 text-white border border-zinc-800 hover:border-amber-500/50 rounded-xl transition-all shadow-lg group w-full sm:w-auto justify-center">
                            <svg class="w-7 h-7 text-white transition-transform group-hover:scale-105" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M3.609 1.814L13.783 12 3.609 22.186c-.182-.183-.294-.44-.294-.724V2.538c0-.284.112-.541.294-.724zM14.935 13.151l2.84 2.839-11.83 6.74c-.218.125-.478.114-.683-.024l9.673-9.555zm3.763-2.14l2.89 1.647c.451.257.451.919 0 1.176l-2.89 1.648-3.132-3.131 3.132-3.14zM14.935 10.85L5.262 1.294c.205-.138.465-.149.683-.024l11.83 6.74-2.84 2.84z"/>
                            </svg>
                            <div class="text-left leading-tight">
                                <p class="text-[10px] text-gray-400 font-medium tracking-wider">GET IT ON</p>
                                <p class="text-base font-bold font-sans">Google Play</p>
                            </div>
                        </a>
                    </div>
                </div>

                {{-- Right Content: Device Mockup --}}
                <div class="lg:col-span-5 flex justify-center relative">
                    <div class="absolute inset-0 bg-amber-500/10 blur-3xl rounded-full scale-75 pointer-events-none"></div>

                    <div class="relative w-[280px] h-[570px] sm:w-[300px] sm:h-[600px] bg-black border-[8px] border-zinc-800 rounded-[40px] shadow-2xl overflow-hidden flex flex-col group hover:border-zinc-700 transition-colors duration-500">
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-32 h-5 bg-zinc-800 rounded-b-2xl z-30"></div>

                        <div class="flex-grow bg-zinc-950 relative z-10 flex flex-col overflow-hidden">
                            <div class="h-44 bg-gradient-to-br from-amber-950 to-zinc-900 border-b border-zinc-800 relative flex items-end p-4">
                                <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://play-lh.googleusercontent.com/wmaJaXkxPRfNOJgX5gsqtabVulQ0VqvqUFw-0XlDCC8b11URGjW1WA5afL3xSzF6oSNIN8bea8a89Z_rVoU4=w526-h296-rw');"></div>
                                <div class="relative z-10 flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="w-7 h-7 text-black" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-white font-bold text-sm leading-tight">Wallpaper App</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-grow p-3 overflow-y-auto no-scrollbar space-y-3">
                                <p class="text-xs font-semibold tracking-wide text-gray-300">Featured Collections</p>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="h-32 bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden relative">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://play-lh.googleusercontent.com/wmaJaXkxPRfNOJgX5gsqtabVulQ0VqvqUFw-0XlDCC8b11URGjW1WA5afL3xSzF6oSNIN8bea8a89Z_rVoU4=w526-h296-rw');"></div>
                                    </div>
                                    <div class="h-32 bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden relative">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://play-lh.googleusercontent.com/pWg31CQU4kHjXImLXf9iD6RNUNxjF5rI0H97RbzakiLM1MDZYtwpKyNAH5uyBplf1zjESR9mfJnnMfLhccUWzw=w2560-h1440-rw');"></div>
                                    </div>
                                    <div class="h-32 bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden relative">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://play-lh.googleusercontent.com/gbJhoZ1vTTB_QBHMZoUrdOggUDy1ZE2pwJj0D0T_h1a6frgn71ZaqDVqQhVGJzjNxlBe1pD814TOO5TgB2RTsQ=w2560-h1440-rw');"></div>
                                    </div>
                                    <div class="h-32 bg-zinc-900 border border-zinc-800 rounded-lg overflow-hidden relative">
                                        <div class="absolute inset-0 bg-cover bg-center opacity-60" style="background-image: url('https://play-lh.googleusercontent.com/csENMLvlSpcYLbuuOT8KmPXnQ_I5qd8NgvcA9ZzMkSLqXmwfYxIS23m5PkYySVFH-5AOVOm0FHEfuWlCYAMEDQ=w2560-h1440-rw');"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute bottom-1 left-1/2 transform -translate-x-1/2 w-28 h-1 bg-zinc-700 rounded-full z-30"></div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>