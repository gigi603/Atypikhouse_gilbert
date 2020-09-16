@extends('layouts.app')
@section('title', "Détails de l'historique")
@section('content')
<div class="admin-user-profil">   
<div class="container">
    <h1 class="h1-title" id="hebergements">Détails de la réservation passée</h1>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h2>{{$historique->house->title}}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-show h-100">
                        <img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}" alt="Hébergement insolite - {{$historique->house->title}}"></a>
                        <div class="card-center">
                            <h3 class="title card-title text-center">
                                <a href="#">{{$historique->house->title}}</a>
                            </h3>
                            <h3 class="price">Total payé: {{$historique->total}}€ pour {{$historique->nb_personnes}} personnes</h3>
                            <p>Type de bien : {{$historique->house->category->category}}</p>
                            @foreach($historique->house->valuecatproprietes as $valuecatpropriete)
                                <p>{{$valuecatpropriete->propriete->propriete}}</p>                               
                            @endforeach
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text">{{$historique->house->description}}</p>
                            <p>Annulation gratuite !</p>
                            <p> Adresse: {{$historique->house->adresse}}</p>
                            <p>Téléphone de l'annonceur : {{$historique->house->phone}}</p>
                            <p>Adresse mail de l'annonceur : {{$historique->user->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection