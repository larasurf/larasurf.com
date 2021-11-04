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
        <nav class="fixed left-0 right-0 top-0 px-6 py-9 mx-auto bg-white z-40">
            <div class="hidden lg:flex">
                <div class="w-1/6 text-3xl font-extrabold text-left">
                    <a id="link-nav-logo" href="/" class="transition hover:text-gray-400">LaraSurf</a>
                </div>
                <div class="w-2/3 flex mt-2 justify-center">
                    <div class="z-50 w-1/3 text-right font-medium">
                        <a id="link-nav-docs" href="/docs" class="nav-link transition hover:text-gray-400 {{ Route::is('docs') ? 'underline' : '' }}">Documentation</a>
                    </div>
                    <div id="how-it-works-container" class="z-10 w-1/3 text-center font-medium">
                        <a id="link-nav-how-it-works" href="/how-it-works" class="nav-link transition hover:text-gray-400 {{ Route::is('how-it-works') ? 'underline' : '' }}">How it works</a>
                    </div>
                    <div class="w-1/3 text-left font-medium">
                        <span class="nav-link line-through">Pricing</span>
                        <span id="its-free" class="text-xs absolute ml-2">It's free!</span>
                    </div>
                </div>
                <div class="w-1/6 flex justify-end pt-2 font-medium">
                    <x-button-link id="link-nav-start" href="/new"><span class="twa twa-ocean mr-1"></span>Start Surfin'</x-button-link>
                </div>
            </div>
            <div id="main-menu"></div>
        </nav>
        <div id="content" class="mt-36 px-6 mx-auto z-10">
            @yield('content')
        </div>
    </div>
    <div id="footer" class="z-10 mt-32 md:mt-48 mb-24 sm:mb-8 relative">
        <footer class="text-center text-sm font-medium">
            <div class="flex">
                <div class="w-1/2 text-right px-2">
                    <a id="link-footer-slack-invite" href="#" class="transition filter hover:invert-50 flex">
                        <div class="flex-grow mr-2">Join the community on Slack</div>
                        <div><img src="/svg/slack.svg" alt="Slack" class="inline" /></div>
                    </a>
                </div>
                <div class="w-1/2 text-left px-2">
                    <a id="link-footer-github" target="_blank" href="https://github.com/larasurf/larasurf/issues" class="transition filter hover:invert-50 flex">
                        <div><img src="/svg/github.svg" alt="GitHub" class="inline" /></div>
                        <div class="flex-grow ml-2">Open an issue on GitHub</div>
                    </a>
                </div>
            </div>
            <div class="mt-3">&copy; {{ date('Y') }} LaraSurf. All rights reserved.</div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts', '')
</body>
</html>
