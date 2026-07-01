<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <title>Login to Your Account | {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="{{ route('login.index') }}" />
    <meta name="description" content="Sign in to your {{ env('APP_NAME') }} account to save favorite wallpapers, comment, access exclusive content, and enjoy a personalized Zenless Zone Zero wallpaper experience." />
    <meta name="keywords" content="zzz wallpapers, zzz wallpaper, zenless zone zero wallpaper, login, sign in, game wallpaper account" />

    <meta name="robots" content="index, follow, max-image-preview:large" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:title" content="Login to Your Account" />
    <meta property="og:description" content="Sign in to your {{ env('APP_NAME') }} account to save favorite wallpapers, comment, access exclusive content, and enjoy a personalized Zenless Zone Zero wallpaper experience." />
    <meta property="og:url" content="{{ route('login.index') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Login to Your Account" />
    <meta name="twitter:description" content="Sign in to your {{ env('APP_NAME') }} account to save favorite wallpapers, comment, access exclusive content, and enjoy a personalized Zenless Zone Zero wallpaper experience." />

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
            "name": "Login",
            "item": "{{ route('login.index') }}"
        }]
    }
    </script>
</head>

<body class="bg-zinc-950 text-gray-200 font-sans min-h-screen flex flex-col selection:bg-amber-500 selection:text-black">

    @include('components.navigation')

    <main class="flex-grow relative overflow-hidden flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-orange-500/10 blur-[120px] rounded-full pointer-events-none -z-10"></div>

        <div class="w-full max-w-5xl grid grid-cols-1 lg:grid-cols-2 gap-0 bg-zinc-900/60 backdrop-blur-xl border border-zinc-700/50 rounded-3xl shadow-2xl overflow-hidden">

            <div class="p-8 lg:p-12 flex flex-col justify-center relative z-10">
                <div class="mb-10 text-center lg:text-left">
                    <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500 mb-3 tracking-wide">Welcome Back</h1>
                    <p class="text-sm text-gray-400 leading-relaxed">Login to access your account, save your favorite Zenless Zone Zero wallpapers, and join the community.</p>
                </div>

                @if (session('error') || session('warning'))
                    <div class="flex items-start {{ session('warning') ? 'bg-amber-500/10 border-amber-500/20 text-amber-400 shadow-[0_0_15px_rgba(245,158,11,0.08)]' : 'bg-red-500/10 border-red-500/20 text-red-400 shadow-[0_0_15px_rgba(239,68,68,0.08)]' }} backdrop-blur-md border px-5 py-4 rounded-2xl text-sm mb-6 relative z-10" role="alert">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="leading-relaxed font-bold tracking-wide">{{ session('error') ?? session('warning') }}</span>
                    </div>
                @endif

                <div id="error-message" class="hidden flex items-start bg-red-500/10 border border-red-500/20 text-red-400 backdrop-blur-md px-5 py-4 rounded-2xl text-sm mb-6 shadow-[0_0_15px_rgba(239,68,68,0.08)] relative z-10" role="alert">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span id="error-text" class="leading-relaxed font-bold tracking-wide"></span>
                </div>

                <div class="pt-2 relative z-10 space-y-6">
                    <button id="google-login-btn" class="w-full bg-white hover:bg-gray-100 text-gray-900 font-bold text-sm sm:text-base py-4 px-6 rounded-full flex items-center justify-center transition-all duration-300 shadow-[0_0_20px_rgba(255,255,255,0.12)] hover:shadow-[0_0_30px_rgba(251,191,36,0.18)] hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-amber-500 relative group/btn overflow-hidden">
                        <svg class="w-6 h-6 mr-3 flex-shrink-0 group-hover/btn:scale-110 transition-transform" viewBox="0 0 24 24">
                            <path fill="#EA4335" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#4285F4" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#34A853" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span id="btn-text" class="tracking-wide">Continue with Google</span>
                        <svg id="loading-spinner" class="animate-spin hidden h-5 w-5 text-gray-900 absolute right-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>

                <div class="mt-10 pt-6 border-t border-zinc-700/50 relative z-10">
                    <p class="text-[11px] sm:text-xs text-gray-400 text-center leading-relaxed font-medium">
                        By continuing, you agree to our <br class="sm:hidden" />
                        <a href="{{ route('tos') }}" class="text-amber-400 hover:text-orange-400 transition-colors font-bold hover:underline underline-offset-4">Terms of Service</a> and
                        <a href="{{ route('privacy') }}" class="text-amber-400 hover:text-orange-400 transition-colors font-bold hover:underline underline-offset-4">Privacy Policy</a>.
                    </p>
                </div>
            </div>

            <div class="hidden lg:flex flex-col justify-center p-12 bg-gradient-to-br from-zinc-950 to-zinc-900 border-l border-zinc-700/50 relative overflow-hidden">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#f59e0b 1px, transparent 1px); background-size: 32px 32px;"></div>

                <div class="relative z-10 space-y-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-white tracking-wide">Unlock Full Access</div>
                            <p class="text-sm text-gray-400 mt-1">Log in to save favorites, comment, and see exclusive high-res content.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-orange-500/10 border border-orange-500/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-white tracking-wide">Curate Your Gallery</div>
                            <p class="text-sm text-gray-400 mt-1">Save your favorite Zenless Zone Zero wallpapers to your profile and build your own collection.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="flex-shrink-0 h-12 w-12 rounded-xl bg-yellow-500/10 border border-yellow-500/30 flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-semibold text-white tracking-wide">Join the Community</div>
                            <p class="text-sm text-gray-400 mt-1">Interact with other fans, follow artists, and share your passion for New Eridu and its agents.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    @include('components.footer')

    <script type="module">
      import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
      import { getAuth, signInWithPopup, GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";

      const firebaseConfig = {
        apiKey: "{{ env('FIREBASE_API_KEY') }}",
        authDomain: "{{ env('FIREBASE_AUTH_DOMAIN') }}",
        projectId: "{{ env('FIREBASE_PROJECT_ID') }}",
      };

      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);
      const provider = new GoogleAuthProvider();

      const loginBtn = document.getElementById('google-login-btn');
      const btnText = document.getElementById('btn-text');
      const spinner = document.getElementById('loading-spinner');
      const errorMessage = document.getElementById('error-message');
      const errorText = document.getElementById('error-text');
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      loginBtn.addEventListener('click', async () => {
        loginBtn.disabled = true;
        loginBtn.classList.add('opacity-90', 'cursor-not-allowed');
        btnText.textContent = 'Processing...';
        spinner.classList.remove('hidden');
        errorMessage.classList.add('hidden');

        try {
          const result = await signInWithPopup(auth, provider);
          const idToken = await result.user.getIdToken();

          const response = await fetch("{{ route('login.firebase') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
              'Accept': 'application/json'
            },
            body: JSON.stringify({ firebase_token: idToken })
          });

          const data = await response.json();
          
          if (data.success) {
            window.location.href = data.redirect;
          } else {
            throw new Error(data.message || 'Failed to connect to server.');
          }
        } catch (error) {
          errorText.textContent = error.message.includes('popup-closed')
            ? 'Login process cancelled.'
            : 'An error occurred. Please try again.';
          
          errorMessage.classList.remove('hidden');
          
          loginBtn.disabled = false;
          loginBtn.classList.remove('opacity-90', 'cursor-not-allowed');
          btnText.textContent = 'Continue with Google';
          spinner.classList.add('hidden');
        }
      });
    </script>
</body>
</html>