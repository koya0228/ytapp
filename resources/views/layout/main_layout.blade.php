<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YT APP</title>
    </head>
    <body>
        <header>

        </header>
        <main>
            @yield('contents')
        </main>
        <footer>

        </footer>
        @yield('load-js')
    </body>
</html>
