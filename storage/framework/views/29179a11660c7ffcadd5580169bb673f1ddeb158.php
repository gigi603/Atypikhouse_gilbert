<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atypikhouse - <?php echo $__env->yieldContent('title'); ?></title>
        <meta description="<?php echo $__env->yieldContent('meta_description'); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


        
        <link rel="icon" type="image/png" href="<?php echo e(asset('img/LogoNavigateur.png')); ?>" />

        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">

        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/cookieconsent.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/stripe.css')); ?>" rel="stylesheet">
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
                        <a class="navbar-brand" id="logo" href="<?php echo e(url('/')); ?>">
                            <img src="<?php echo e(asset('img/Logo.png')); ?>" alt="Logo" width="70">
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
                            <?php if(Auth::guest()): ?>
                            
                            <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                            <li><a href="<?php echo e(route('houses')); ?>">Nos hébergements</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Inscription</a></li>
                            <li><a href="<?php echo e(route('login')); ?>">Connexion</a></li>
                            <?php elseif(Auth::guard('admin')->check()): ?>
                            <li><a href="<?php echo e(route('admin.home')); ?>">Accueil</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->prenom); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Se déconnecter
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                    <li><a href="<?php echo e(route('posts.index')); ?>">Contact</a></li>
                                </ul>
                            </li>
                            <?php else: ?>
                            <li><a href="<?php echo e(route('home')); ?>">Accueil</a></li>
                            <li><a href="<?php echo e(route('houses')); ?>">Nos hébergements</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->prenom); ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(url('/profile')); ?>/<?php echo e(Auth::user()->id); ?>">Mon profil</a></li>
                                    <li><a href="<?php echo e(route('user.messages')); ?>">Mes notifications</a></li>
                                    <li><a href="<?php echo e(route('user.houses')); ?>">Mes annonces</a></li>
                                    <li><a href="<?php echo e(route('user.reservations')); ?>">Mes réservations</a></li>
                                    <li><a href="<?php echo e(route('user.historiques')); ?>">Mes réservations passées</a></li>
                                    <li><a href="<?php echo e(route('user.reservationsannulees')); ?>">Mes réservations annulées</a></li>
                                    <li><a href="<?php echo e(url('/house/create_step1')); ?>">Ajouter une annonce</a></li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Se déconnecter
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?php echo e(route('posts.index')); ?>">Contact</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php echo $__env->yieldContent('content'); ?>
            <footer class="footer" role="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-3">
                            <ul>
                                <li><a href="<?php echo e(route('mentions_legales')); ?>">Mentions légales</a></li>
                                <li><a href="<?php echo e(route('politique_de_confidentialite')); ?>">Politique de confidentialité</a></li>
                                <li><a href="<?php echo e(route('cgu')); ?>">Conditions générales d'utilisation</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><a href="<?php echo e(route('apropos')); ?>">A propos</a></li>
                                <li><a href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                                <li><a href="<?php echo e(route('cgv')); ?>">Conditions générales de vente</a></li>
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

        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/user.js')); ?>"></script>
        <script src="<?php echo e(asset('js/cookieconsent.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/cookie.js')); ?>"></script>
        <?php echo $__env->yieldContent('script'); ?>

    </body>
</html>
