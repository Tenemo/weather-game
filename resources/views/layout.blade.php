<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=3">
    <link rel="manifest" href="/site.webmanifest?v=3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=3" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon.ico?v=3">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
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
    <header class="header">
        <a class="logo" href="{{ route('home') }}">
            weather.game
        </a>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @auth
        <div class="userActions">
            <span class="username">Logged in as <b>{{ Auth::user()->name }}</b></span>
            <a class="view-users" href="{{ route('users') }}">Users</a>
            <a class="delete" href="{{ route('delete') }}">Delete account</a>
            <a class="logout" href="{{ route('logout') }}">Logout</a>
        </div>
        @else
        <div class="userActions">
            <a class="register" href="{{ route('register') }}">Register</a>
            <a class="login" href="{{ route('login') }}">Login</a>
        </div>
        @endauth
        <span>Source:&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://github.com/Tenemo/weather-game">/weather-game</a><span></span>
    </footer>
</body>

</html>
