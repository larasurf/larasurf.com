<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>@yield('title', 'LaraSurf')</title>
</head>
<body class="antialiased">
    <nav>
        <h1>navigation</h1>
    </nav>
    @yield('content')
</body>
</html>
