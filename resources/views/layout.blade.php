<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

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
    <header class="header">
        <a class="logo" href="{{ route('home') }}">
            weather.game
        </a>
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
    </header>
    <main>
        @yield('content')
    </main>
    <footer>GitHub:&nbsp;<a target="_blank" rel="noopener noreferrer" href="https://github.com/Tenemo">/Tenemo</a></footer>
</body>

</html>
