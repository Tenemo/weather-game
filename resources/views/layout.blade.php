<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <base href="/" />
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <title>@yield('title', 'weather.game')</title>
    <script>
        if (window.MSCompatibleInfo) {
            var error =
                "Internet Explorer is not supported. Please use a modern browser instead.";
            document.querySelector("html").innerHTML = error;
            throw new Error(error);
        }
    </script>
</head>

<body>
    <noscript>You need to enable JavaScript to run this app. </noscript>
    <header class="header"><a href="{{ route('home') }}">weather.game</a></header>
    <main>
        @yield('content')
    </main>
</body>

</html>
