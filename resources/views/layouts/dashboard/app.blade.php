<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body>
    <div id="app">

        {{--
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif@else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item navbar-item--sidebar" href="#">
                    <div class="icon-options i-options">
                        <div class="i-options__row">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="i-options__row">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="i-options__row">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </a>
                <a class="navbar-item" href="/admin">
                    <i class="fas fa-tachometer-alt"></i>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <!-- navbar items -->
                </div>
                <div class="navbar-end">
                    <a class="navbar-item" href="/">
                        Strona główna
                    </a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown">
                            <a href="#" class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                Wyloguj
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
        </nav>
        <div class="dashboard-wrapper">
            <aside class="menu">
                <ul class="menu-list">
                    <li><a href="/admin">Kokpit</a></li>
                    <li><a href="/admin/posts">Posty</a>
                        <ul class="submenu-list">
                            <li><a href="/admin/posts">Wszystkie Posty</a></li>
                            <li><a href="/admin/post/add">Dodaj Post</a> </li>
                        </ul>
                    </li>
                    <li><a href="/admin/teams/seniorzy">Drużyny</a>
                        <ul class="submenu-list">
                            <li><a href="/admin/teams/seniorzy">Seniorzy</a></li>
                            <li><a href="/admin/teams/juniorzy">Juniorzy</a></li>
                            <li><a href="/admin/teams/trampkarze">Trampkarze</a></li>
                            <li><a href="/admin/teams/młodzicy">Młodzicy</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/games/seniorzy">Rozgrywki</a>
                        <ul class="submenu-list">
                            <li><a href="/admin/games/seniorzy">Seniorzy</a></li>
                            <li><a href="/admin/games/juniorzy">Juniorzy</a> </li>
                            <li><a href="/admin/games/trampkarze">Trampkarze</a> </li>
                            <li><a href="/admin/games/młodzicy">Młodzicy</a> </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <main class="dashboard-content">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    {{-- script run routing from vue and app doesnt work properly, without scripts --}} {{--
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script>
        (function () {
            var hamburger = document.querySelector(".navbar-burger");
            var menu = document.querySelector(".navbar-menu");

            var sidebar_icon = document.querySelector(".navbar-item--sidebar");
            var sidebar_menu = document.querySelector(".menu");

            function toggleMenu(e) {

                if (this.classList.contains("is-active")) {
                    this.classList.remove('is-active');
                    menu.classList.remove('is-active');
                } else {
                    this.classList.add('is-active');
                    menu.classList.add('is-active');
                }
            }

            function toggleSidebar(e) {
                e.preventDefault();
                console.dir(this);
                if (sidebar_menu.classList.contains("is-active")) {
                    this.classList.remove("is-active");
                    sidebar_menu.classList.remove("is-active");
                } else {
                    this.classList.add("is-active");
                    sidebar_menu.classList.add("is-active");
                }
            }

            hamburger.addEventListener("click", toggleMenu);
            sidebar_icon.addEventListener("click", toggleSidebar);
        })();

    </script>
</body>

</html>
