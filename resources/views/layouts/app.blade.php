<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atypikhouse - @yield('title')</title>
        <meta description="@yield('meta_description')">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        {{-- Logo Navigateur --}}
        <link rel="icon" type="image/png" href="{{ asset('img/LogoNavigateur.png') }}" />

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">

        <script src="{{ asset('js/jquery.min.js') }}"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/cookieconsent.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Logo -->
                        <a class="navbar-brand" id="logo" href="{{ url('/') }}">
                            <img src="{{ asset('img/Logo.png') }}" alt="Logo" width="70">
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication/Visitors Links -->
                            @if (Auth::guest())
                            
                            <li><a href="{{ route('home') }}">Accueil</a></li>
                            <li><a href="{{ route('houses') }}">Nos hébergements</a></li>
                            <li><a href="{{ route('register') }}">Inscription</a></li>
                            <li><a href="{{ route('login') }}">Connexion</a></li>
                            @elseif(Auth::guard('admin')->check())
                            <li><a href="{{ route('admin.home') }}">Accueil</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->prenom }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Se déconnecter
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                </ul>
                            </li>
                            @else
                            <li><a href="{{ route('home') }}">Accueil</a></li>
                            <li><a href="{{ route('houses') }}">Nos hébergements</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->prenom }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/profile')}}/{{Auth::user()->id}}">Mon profil</a></li>
                                    <li><a href="{{route('user.messages')}}">Mes notifications</a></li>
                                    <li><a href="{{route('user.houses')}}">Mes annonces</a></li>
                                    <li><a href="{{route('user.reservations')}}">Mes réservations</a></li>
                                    <li><a href="{{route('user.historiques')}}">Mes réservations passées</a></li>
                                    <li><a href="{{route('user.reservationsannulees')}}">Mes réservations annulées</a></li>
                                    <li><a href="{{ url('/house/create_step1') }}">Ajouter une annonce</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Se déconnecter
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('user.contact') }}">Contact</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            <footer class="footer" role="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-3">
                            <ul>
                                <li><a href="{{ route('mentions_legales') }}">Mentions légales</a></li>
                                <li><a href="{{ route('politique_de_confidentialite') }}">Politique de confidentialité</a></li>
                                <li><a href="{{ route('cgu') }}">Conditions générales d'utilisation</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><a href="{{ route('apropos') }}">A propos</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('cgv') }}">Conditions générales de vente</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul id="reseaux">
                                <div><li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li></div>
                                <div><li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a></li></div>
                                <div><li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></li></div>
                                <div><li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube-square fa-2x"></i></a></li></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Scripts -->

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/user.js') }}"></script>
        <script src="{{ asset('js/cookieconsent.min.js') }}"></script>
        <script src="{{ asset('js/cookie.js') }}"></script>
        <script src="{{ asset('js/field-empty.js') }}"></script>
        @yield('script')

    </body>
</html>
