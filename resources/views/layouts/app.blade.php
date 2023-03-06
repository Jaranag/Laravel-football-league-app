<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LeagueApp - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        @include('partials.header')

            @if (session('status'))
                <div class="status">
                    {{ session('status') }}
                </div>
            @endif
            
        @yield('content')
        @include('partials.footer')
    </body>
</html>