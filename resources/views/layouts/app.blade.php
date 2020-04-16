<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @toastr_css
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm banner">
            <div class="noflexwrap">
                <a href="/home" class="navbar-brand banner__logo">
                    <img src="/img/logo.png" alt="" aria-label="Terug naar beginscherm" class="banner__logo__img">
                </a>

                <!-- ERROR NOTIFICATIE TEST -->
                <!-- <a id="js--header" class="navbar-brand banner__logo">
                    <img src="/img/logo.png" alt="" class="banner__logo__img">
                </a> -->

                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <!-- <div class="collapse navbar-collapse show" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">

                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav banner__nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item banner__nav__item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item banner__nav__item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown banner__nav__item">
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->

                                <div class="dropdown-menu dropdown-menu-right banner__nav__item show logout" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item cancel" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            <!-- </div> -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<div class="notificationBox" id="js--notification">
  <div class="notificationBox__background" id="js--notification_background"></div>
  <div class="notificationBox__window">
    <div class="notificationBox__topBar">
      <h2 class="notificationBox__topBar__title" id="js--notification_title">NOTIFICATIE</h2>
      <span class="notificationBox__topBar__close" id="js--notification_close">&times;</span>
    </div>
    <div class="notificationBox__main">
      <p class="notificationBox__main__text" id="js--notification_text">Er is iets fout met de bel! Er is geen vingerafdruk gescanned. Het is mogelijk dat de scanner vervangen moet worden.</p>

      <div class="notificationBox__main__button" id="js--notification_ok">begrepen</div>
    </div>
  </div>
</div>

@jquery
@toastr_js
@toastr_render
</html>
