<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @if(config('app.env') === 'production')
        <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=dTxoPW3zcC21eM0fHvKqXQ&gtm_preview=env-1&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-K4RLG9M');</script>
            <!-- End Google Tag Manager -->
    @elseif(config('app.env') === 'stage')
        <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=2E-kJeduQAMhTUgQtZxzxg&gtm_preview=env-7&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-K4RLG9M');</script>
            <!-- End Google Tag Manager -->
    @endif
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/fonts.js') }}"></script>

    <title>@yield('title', 'LaraSurf')</title>
    <meta name="description" content="LaraSurf combines Docker, CircleCI, and AWS to create an end to end solution for generating, implementing, and deploying Laravel applications."/>

    <meta property="og:title" content="@yield('title', 'LaraSurf')" />
    <meta property="og:description" content="LaraSurf combines Docker, CircleCI, and AWS to create an end to end solution for generating, implementing, and deploying Laravel applications." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url('/img/larasurf.png') }}" />

    <link rel="apple-touch-icon" sizes="57x57" href="/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
    <link rel="manifest" href="/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="bg-white overflow-y-scroll transition-opacity duration-500 opacity-0">
    @if(config('app.env') === 'production')
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4RLG9M&gtm_auth=dTxoPW3zcC21eM0fHvKqXQ&gtm_preview=env-1&gtm_cookies_win=x"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @elseif(config('app.env') === 'stage')
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K4RLG9M&gtm_auth=2E-kJeduQAMhTUgQtZxzxg&gtm_preview=env-7&gtm_cookies_win=x"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    @endif
    <div class="z-30">
        @if(!isset($show_header) || $show_header)
            <nav class="fixed left-0 top-0 right-0 px-6 py-9 mx-auto bg-white z-50">
                <div class="hidden lg:flex">
                    <div class="w-1/5 text-3xl font-extrabold text-left">
                        <a id="link-nav-logo" href="/" class="transition hover:text-gray-400">LaraSurf</a>
                    </div>
                    <div class="w-3/5 flex mt-2 px-6 justify-end">
                        <div class="z-10 text-center font-medium px-6">
                            <a id="link-nav-docs" href="/docs" class="nav-link transition hover:text-gray-400 {{ Route::is('docs') ? 'underline' : '' }}">Documentation</a>
                        </div>
                        <div class="z-10 text-center font-medium px-6">
                            <a id="link-nav-how-it-works" href="/how-it-works" class="nav-link transition hover:text-gray-400 {{ Route::is('how-it-works') ? 'underline' : '' }}">How it works</a>
                        </div>
                        <div class="z-10 text-center font-medium px-6">
                            <a id="link-nav-pricing" href="/pricing" class="nav-link transition hover:text-gray-400 {{ Route::is('pricing') ? 'underline' : '' }}">Pricing</a>
                        </div>
                        <div class="z-10 text-center font-medium px-6">
                            <a id="link-nav-custom-project" href="/custom-project" class="nav-link transition hover:text-gray-400 {{ Route::is('custom-project') ? 'underline' : '' }}">Custom Project</a>
                        </div>
                    </div>
                    @auth
                        <div id="avatar-menu" class="w-1/5"></div>
                    @elseguest
                        <div class="w-1/5 flex justify-end pt-2 font-medium">
                            <x-button-link id="link-nav-sign-up" href="/continue">
                                Sign Up
                                <div class="inline absolute">
                                    <span class="twa twa-ocean relative"></span>
                                </div>
                            </x-button-link>
                            <a id="link-nav-login" href="/continue" class="nav-link transition hover:text-gray-400 ml-6 font-bold">Login</a>
                        </div>
                    @endauth
                </div>
                <div id="main-menu"></div>
                <div class="mt-6 w-100 border-b border-gray-100"></div>
            </nav>
        @endif
        <div id="content" class="mt-36 px-6 mx-auto z-10 block">
            @yield('content')
        </div>
    </div>
    <div id="footer" class="z-10 mt-32 md:mt-48 mb-24 sm:mb-8 relative">
        <footer class="text-center text-sm font-medium">
            <div class="mt-3">&copy; {{ date('Y') }} - All rights reserved by <strong>LaraSurf</strong></div>
        </footer>
    </div>
    <script>
        @auth
            window.user = @json(['avatar_src' => auth()->user()->avatar_src, 'nickname' => auth()->user()->nickname])
        @elseguest
            window.user = false;
        @endauth
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts', '')
</body>
</html>
