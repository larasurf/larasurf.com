<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
<body class="antialiased">
    <div class="bg-white">
        <nav class="flex mx-6 my-9">
            <div class="w-1/3 text-3xl text-center font-extrabold">
                <a href="/">LaraSurf</a>
            </div>
            <div class="w-1/3 flex mt-2">
                <div class="w-1/3 text-center font-medium">
                    <a href="/docs">Documentation</a>
                </div>
                <div class="w-1/3 text-center font-medium">
                    <a href="/how-it-works">How it works</a>
                </div>
                <div class="w-1/3 text-center font-medium">
                    <a href="/pricing">Pricing</a>
                </div>
            </div>
            <div class="w-1/3 text-center flex justify-center pt-2">
                <x-button-link href="/new">Start Surfin' <span class="twa twa-ocean"></span></x-button-link>
            </div>
        </nav>
        <div>
            @yield('content')
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
