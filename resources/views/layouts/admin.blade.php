<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>AtypikHouse - Admin</title>

    {{-- Logo Navigateur --}}
    <link rel="icon" type="image/png" href="{{ asset('img/LogoNavigateur.png') }}" />

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <h3 id="titre">Administration AtypikHouse</h3>
            <ul id="menu">
                <li><a href="{{ url('/') }}" class="btn btn-success">Site Internet</a></li>
                <li><a href="{{route('admin.logout') }}" class="btn btn-danger">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="{{route('admin.listusers') }}" id="3">Utilisateurs</a></li>
                    <li><a href="{{route('admin.categories') }}" id="5">Categories</a></li>
                    <li><a href="{{route('admin.messages') }}" id="5">Messages</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @yield('content')
    </div>
<footer>

</footer>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/admin_create_house.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" crossorigin="anonymous"></script> --}}
</body>
</html>
