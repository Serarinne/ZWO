<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Privacy Policy - {{ env('APP_NAME') }}</title>

    <meta name="description" content="Read the Privacy Policy for {{ env('APP_NAME') }}. Understand what information we collect, how we use it, and your rights related to your data on our Zenless Zone Zero wallpaper platform.">
    <meta name="keywords" content="zzz wallpapers, privacy policy, zzz wallpapers privacy, data protection, user privacy, zzz wallpaper privacy, zenless zone zero privacy">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Understand what information we collect at {{ env('APP_NAME') }}, how we use it, and your rights related to your data.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Privacy Policy - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Understand what information we collect at {{ env('APP_NAME') }}, how we use it, and your rights related to your data.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "WebPage",
        "name": "Privacy Policy",
        "description": "Privacy Policy for {{ env('APP_NAME') }}.",
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
                "name": "Privacy Policy",
                "item": "{{ url()->current() }}"
            }]
        }
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 max-w-4xl">

            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-4">
                    Privacy Policy
                </h1>
                <p class="text-gray-400">
                    Last updated: <span class="text-gray-300 font-medium">May 01, 2026</span>
                </p>
            </div>

            <article class="bg-zinc-900/60 backdrop-blur-md border border-zinc-700/50 rounded-2xl shadow-2xl p-8 md:p-12 relative overflow-hidden">

                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent opacity-50"></div>

                <div class="space-y-8 text-gray-300 leading-relaxed text-lg">
                    <p class="border-b border-zinc-700/50 pb-6">
                        Welcome to <strong>{{ env('APP_NAME') }}</strong>. We respect your privacy and are committed to protecting it. This Privacy Policy explains what information we collect, how we use it, and your rights in relation to it regarding our Zenless Zone Zero wallpaper platform.
                    </p>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">01</span>
                            Information We Collect
                        </h2>
                        <ul class="list-none space-y-3 pl-2">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Account Information:</strong> When you register, we collect your username, email address, and encrypted password.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Uploaded Content:</strong> We store the wallpapers you upload along with metadata like tags, characters, and artists.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span><strong>Usage Data:</strong> We automatically collect basic data about how you interact with our site, such as IP address and browser type, to improve performance and security.</span>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">02</span>
                            How We Use Your Information
                        </h2>
                        <p class="mb-4">We use the collected information to:</p>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-zinc-950/60 p-4 rounded-lg border border-zinc-700/50">
                                Provide, operate, and maintain our website.
                            </div>
                            <div class="bg-zinc-950/60 p-4 rounded-lg border border-zinc-700/50">
                                Manage your account and facilitate uploads.
                            </div>
                            <div class="bg-zinc-950/60 p-4 rounded-lg border border-zinc-700/50">
                                Prevent abuse and help protect platform security.
                            </div>
                            <div class="bg-zinc-950/60 p-4 rounded-lg border border-zinc-700/50">
                                Communicate with you regarding service updates.
                            </div>
                        </div>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">03</span>
                            Cookies
                        </h2>
                        <p>
                            We use cookies primarily to maintain your session when you are logged in. Cookies are small files stored on your device that help our website function properly. You can instruct your browser to refuse all cookies, but you may not be able to use some portions of our service, including login-related features.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">04</span>
                            Data Sharing
                        </h2>
                        <p>
                            We do <strong>not</strong> sell, trade, or otherwise transfer your personally identifiable information to outside parties. However, please note that any content you voluntarily upload, including wallpapers or comments, may be public by nature.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">05</span>
                            Contact Us
                        </h2>
                        <p>
                            If you have any questions about this Privacy Policy, please do not hesitate to contact us.
                        </p>
                        <div class="mt-4">
                            <a href="mailto:privacy@zzzwallpapers.com" class="inline-flex items-center text-amber-400 hover:text-white transition-colors bg-zinc-950/60 px-6 py-3 rounded-lg border border-amber-900/30 hover:border-amber-500/50">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                privacy@zzzwallpapers.com
                            </a>
                        </div>
                    </section>
                </div>
            </article>

        </div>
    </main>

    @include('components.footer')
</body>
</html>