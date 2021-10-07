<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/fonts.js') }}"></script>

    <title>@yield('title', 'LaraSurf')</title>

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
<body class="antialiased bg-white overflow-y-scroll transition-opacity duration-500 opacity-0 lg:mr-0">
    <div class="z-10">
        <nav class="relative px-6 py-9 mx-auto">
            <div class="hidden lg:flex">
                <div class="w-1/6 text-3xl font-extrabold text-left">
                    <a href="/" class="transition hover:text-gray-400">LaraSurf</a>
                </div>
                <div class="w-2/3 flex mt-2 justify-center">
                    <div class="w-1/3 text-right font-medium">
                        <a href="/docs" class="nav-link transition hover:text-gray-400 {{ Route::is('docs') ? 'underline' : '' }}">Documentation</a>
                    </div>
                    <div id="how-it-works-container" class="w-1/3 text-center font-medium">
                        <a href="/how-it-works" class="nav-link transition hover:text-gray-400 {{ Route::is('how-it-works') ? 'underline' : '' }}">How it works</a>
                    </div>
                    <div class="w-1/3 text-left font-medium">
                        <a href="/pricing" class="nav-link transition hover:text-gray-400 {{ Route::is('pricing') ? 'underline' : '' }}">Pricing</a>
                    </div>
                </div>
                <div class="w-1/6 flex justify-end pt-2 font-medium">
                    <x-button-link href="/new">Start Surfin' <span class="twa twa-ocean"></span></x-button-link>
                </div>
            </div>
            <div id="main-menu"></div>
        </nav>
        <div id="content" class="px-6 mx-auto">
            <div class="-mr-3 lg:mr-0">
                @yield('content')
            </div>
        </div>
    </div>
    <div id="footer" class="z-10 mt-32 md:mt-64 mb-12 sm:mb-6 relative">
        <footer class="text-center text-sm font-medium">
            &copy; {{ date('Y') }} - LaraSurf LLC
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts', '')
</body>
</html>
