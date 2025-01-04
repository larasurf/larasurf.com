<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url()->to('/sitemap.xml') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/fonts.js') }}"></script>

    <title>@yield('title', 'LaraSurf')</title>
    <meta name="description" content="LaraSurf combines Docker, CircleCI, and AWS to create an end-to-end solution for generating, implementing, and deploying Laravel applications."/>

    <meta property="og:title" content="@yield('title', 'LaraSurf')" />
    <meta property="og:description" content="LaraSurf combines Docker, CircleCI, and AWS to create an end-to-end solution for generating, implementing, and deploying Laravel applications." />
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
    @if(app()->isProduction())
        <script defer data-api="/api/event" data-domain="larasurf.com" src="/js/script.js"></script>
    @endif
    @yield('head', '')
</head>
<body class="bg-white overflow-y-scroll transition-opacity duration-500 opacity-0">
    <div class="z-30">
        @if(!isset($show_header) || $show_header)
            <nav class="fixed left-0 top-0 right-0 px-6 pt-3 pb-6 lg:py-6 mx-auto bg-white z-50">
                <div class="hidden lg:flex">
                    <div class="w-1/5 text-3xl font-extrabold text-left">
                        <a id="link-nav-logo" href="/" class="transition hover:text-gray-400">LaraSurf</a>
                    </div>
                    <div class="w-3/5 flex mt-2 pl-7 xl:pl-10 pr-3 justify-start">
                        <div class="z-10 text-center font-medium px-3 xl:px-6">
                            <a id="link-nav-docs" href="/docs" class="nav-link transition hover:text-gray-400 {{ Route::is('docs') ? 'underline' : '' }}">Documentation</a>
                        </div>
                        <div class="z-10 text-center font-medium px-3 xl:px-6">
                            <a id="link-nav-how-it-works" href="/how-it-works" class="nav-link transition hover:text-gray-400 {{ Route::is('how-it-works') ? 'underline' : '' }}">How it works</a>
                        </div>
                        <div class="z-10 text-center font-medium pl-3 lg:pr-12 xl:pl-6 xl:pr-16">
                            <span class="nav-link line-through">Pricing</span>
                            <span id="its-free" class="text-xs absolute ml-2">It's free!</span>
                        </div>
{{--                        <div class="z-10 text-center font-medium px-3 xl:px-6">--}}
{{--                            <a id="link-nav-custom-projects" href="/custom-projects" class="nav-link transition hover:text-gray-400 {{ Route::is('custom-projects') ? 'underline' : '' }}">Custom Projects</a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="w-1/5 text-right pt-2 font-medium">
                        <x-button-link id="link-nav-start" href="/new">
                            Start Surfin'
                            <div class="inline absolute ml-2">
                                🌊
                            </div>
                        </x-button-link>
                    </div>
                </div>
                <div id="main-menu"></div>
                <div class="lg:mt-6 w-100 border-b border-gray-100"></div>
            </nav>
        @endif
        <div id="content" class="mt-24 px-6 mx-auto z-10 block">
            @yield('content')
        </div>
    </div>
    <div id="footer" class="z-10 mt-16 md:mt-16 mb-4 relative">
        <footer class="text-center text-sm font-medium">
            <a id="link-footer-github" target="_blank" href="https://github.com/larasurf/larasurf" class="transition filter hover:invert-50">
                <img src="/svg/github.svg" alt="GitHub" class="inline relative bottom-0.5" />
                <span class="ml-2">LaraSurf on GitHub</span>
            </a>
        </footer>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts', '')
</body>
</html>
