<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us - {{ env('APP_NAME') }}</title>

    <meta name="title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta name="description" content="Have a question, feedback, or artist inquiry? Contact the {{ env('APP_NAME') }} team. We are here to help with any Zenless Zone Zero wallpaper related questions.">
    <meta name="keywords" content="zzz wallpapers, contact zzz wallpapers, zzz wallpaper feedback, get in touch, zenless zone zero support, game wallpaper inquiry">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('contact') }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('contact') }}">
    <meta property="og:title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Get in touch with the {{ env('APP_NAME') }} team for questions, feedback, or support.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ route('contact') }}">
    <meta name="twitter:title" content="Contact Us - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Get in touch with the {{ env('APP_NAME') }} team for questions, feedback, or support.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "BreadcrumbList",
        "itemListElement": [{
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ route('home') }}"
        }, {
            "@@type": "ListItem",
            "position": 2,
            "name": "Contact Us",
            "item": "{{ route('contact') }}"
        }]
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">
        <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-orange-500/10 blur-[120px] rounded-full pointer-events-none -z-10 animate-pulse" style="animation-duration: 4s;"></div>
        <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10 animate-pulse" style="animation-duration: 5s;"></div>

        <div class="container mx-auto px-4 max-w-3xl">

            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-400 to-yellow-500 mb-4 tracking-tight">
                    Get in Touch
                </h1>
                <p class="text-gray-400 max-w-lg mx-auto text-lg leading-relaxed">
                    Have a question about Zenless Zone Zero wallpapers, feedback about the site, or just want to say hello? We'd love to hear from you.
                </p>
            </div>

            <div class="bg-zinc-900/50 backdrop-blur-xl border border-zinc-700/50 hover:border-amber-500/30 transition-colors duration-500 rounded-3xl shadow-[0_0_40px_-10px_rgba(0,0,0,0.5)] p-6 md:p-10 relative overflow-hidden group">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>

                <div class="space-y-8">
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl font-bold text-white mb-3 flex items-center justify-center md:justify-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-amber-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            Contact Information
                        </h2>
                        <p class="text-gray-400 leading-relaxed text-sm md:text-base">
                            If you need help, want to send feedback, or have an artist or business inquiry,
                            you can contact our team directly through the email address below.
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="bg-zinc-950/60 hover:bg-zinc-800/80 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-amber-500/10 border border-zinc-700/50 hover:border-amber-500/30 rounded-2xl p-6 group/email">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-amber-500/10 rounded-lg group-hover/email:bg-amber-500/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-amber-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-400 font-medium">Email Support</p>
                            </div>
                            <a href="mailto:support@zzzwallpapers.com" class="text-white font-medium hover:text-amber-400 transition-colors break-all text-lg">
                                support@zzzwallpapers.com
                            </a>
                        </div>

                        <div class="bg-zinc-950/60 hover:bg-zinc-800/80 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-orange-500/10 border border-zinc-700/50 hover:border-orange-500/30 rounded-2xl p-6 group/time">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="p-2 bg-orange-500/10 rounded-lg group-hover/time:bg-orange-500/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-400 font-medium">Availability</p>
                            </div>
                            <p class="text-white font-medium text-lg">
                                As soon as possible
                            </p>
                        </div>
                    </div>

                    <div class="bg-zinc-950/40 border border-zinc-700/50 rounded-2xl p-6 md:p-8">
                        <h3 class="text-lg font-semibold text-white mb-5 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-orange-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            What you can contact us about
                        </h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-gray-300 hover:text-white transition-colors">General questions about wallpapers</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-gray-300 hover:text-white transition-colors">Feedback and suggestions</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-gray-300 hover:text-white transition-colors">Copyright or artist-related inquiries</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-gray-300 hover:text-white transition-colors">Technical issues on the website</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center text-sm text-gray-300 flex flex-col sm:flex-row items-center justify-center gap-1">
                <p>You can email us directly at</p>
                <a href="mailto:support@zzzwallpapers.com" class="text-amber-300 hover:text-amber-200 font-medium underline hover:no-underline transition-colors decoration-amber-300/60 underline-offset-4">
                    support@zzzwallpapers.com
                </a>
            </div>

        </div>
    </main>

    @include('components.footer')
</body>
</html>