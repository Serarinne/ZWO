<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Terms of Service - {{ env('APP_NAME') }}</title>

    <meta name="description" content="Review the Terms of Service for {{ env('APP_NAME') }}. Learn about your rights and responsibilities regarding user accounts, content submission, and copyright on our Zenless Zone Zero wallpaper platform.">
    <meta name="keywords" content="zzz wallpapers, terms of service, tos, user agreement, rules, copyright policy, zzz wallpaper terms, zenless zone zero rules">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Terms of Service - {{ env('APP_NAME') }}">
    <meta property="og:description" content="Learn about your rights and responsibilities regarding user accounts, content, and copyright on {{ env('APP_NAME') }}.">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Terms of Service - {{ env('APP_NAME') }}">
    <meta name="twitter:description" content="Learn about your rights and responsibilities regarding user accounts, content, and copyright on {{ env('APP_NAME') }}.">

    @include('components.file-assets')

    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "WebPage",
        "name": "Terms of Service",
        "description": "Terms of Service agreement for {{ env('APP_NAME') }} users.",
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
                "name": "Terms of Service",
                "item": "{{ url()->current() }}"
            }]
        }
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden py-12">
        <div class="absolute top-0 right-1/2 translate-x-1/2 w-[800px] h-[500px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="container mx-auto px-4 max-w-4xl">

            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-4">
                    Terms of Service
                </h1>
                <p class="text-gray-400">
                    Last updated: <span class="text-gray-300 font-medium">May 01, 2026</span>
                </p>
            </div>

            <article class="bg-zinc-900/60 backdrop-blur-md border border-zinc-700/50 rounded-2xl shadow-2xl p-8 md:p-12 relative overflow-hidden">

                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-amber-500 to-transparent opacity-50"></div>

                <div class="space-y-8 text-gray-300 leading-relaxed text-lg">
                    <p class="border-b border-zinc-700/50 pb-6">
                        Welcome to <strong>{{ env('APP_NAME') }}</strong>. By accessing or using our website, you agree to be bound by these Terms of Service. If you disagree with any part of the terms, then you may not access the service.
                    </p>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">01</span>
                            User Accounts
                        </h2>
                        <div class="pl-2 border-l-2 border-zinc-700 ml-4">
                            <p class="pl-4">
                                To upload content, you must create an account. You are responsible for safeguarding your password and for any activities or actions under your account. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
                            </p>
                        </div>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">02</span>
                            User-Generated Content
                        </h2>
                        <ul class="space-y-3 pl-2">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>You are solely responsible for the content you upload, including images and associated metadata such as tags, characters, locations, and artists.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>By uploading content, you grant {{ env('APP_NAME') }} a worldwide, non-exclusive, royalty-free license to use, reproduce, and display such content in connection with the service.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-red-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <span>You agree not to post content that is illegal, obscene, defamatory, threatening, or otherwise objectionable.</span>
                            </li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">03</span>
                            Copyright Policy
                        </h2>
                        <p class="mb-4">
                            We respect the intellectual property rights of others. It is our policy to respond to any claim that content posted on the site infringes on the copyright or other intellectual property rights of any person or entity.
                        </p>
                        <div class="bg-zinc-950/60 p-4 rounded-lg border border-zinc-700/50 flex items-start">
                            <svg class="w-6 h-6 text-amber-400 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-sm text-gray-200">If you are a copyright owner, please submit your claim via email:</p>
                                <a href="mailto:dmca@zzzwallpapers.com" class="text-amber-300 hover:text-white font-semibold transition-colors underline underline-offset-4 decoration-amber-300/50">
                                    dmca@zzzwallpapers.com
                                </a>
                                <p class="text-xs text-gray-300 mt-1">Subject: "Copyright Infringement"</p>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">04</span>
                            Termination
                        </h2>
                        <p>
                            We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-white flex items-center">
                            <span class="bg-zinc-700/50 p-2 rounded-lg mr-3 text-amber-400 text-sm">05</span>
                            Disclaimer
                        </h2>
                        <p class="italic text-gray-400 border-l-4 border-zinc-600 pl-4">
                            The service is provided on an "AS IS" and "AS AVAILABLE" basis. {{ env('APP_NAME') }} makes no warranties, expressed or implied, and hereby disclaims all other warranties. We do not warrant that the website will be uninterrupted or error-free.
                        </p>
                    </section>
                </div>
            </article>

        </div>
    </main>

    @include('components.footer')
</body>
</html>