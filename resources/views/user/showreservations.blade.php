@extends('layouts.app')
@section('title', "Détails de la réservation")
@section('content')
<div class="container">
    <h1 class="h1-title">Détails de la réservation</h1>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h2>{{$reservation->house->title}}</h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card-show h-100">
                        <img class="img-responsive img_house" src="{{ asset('img/houses/'.$reservation->house->photo) }}" alt="Hébergement insolite - {{$reservation->house->title}}"></a>
                        <div class="card-center">
                            <h4 class="title card-title text-center">
                                <a href="#">{{$reservation->house->title}}</a>
                            </h4>
                            <h3 class="price">Total payé: {{$reservation->total}}€ pour {{$reservation->nb_personnes}} personnes</h3>
                            <p>Type de bien : {{$reservation->house->category->category}}</p>
                            @foreach($reservation->house->valuecatproprietes as $valuecatpropriete)
                                <p>{{$valuecatpropriete->propriete->propriete}}</p> 
                            @endforeach
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text">{{$reservation->house->description}}</p>
                            <p>Annulation gratuite !</p>
                            <p> Adresse: {{$reservation->house->adresse}}</p>
                            <p>Téléphone de l'annonceur : {{$reservation->house->phone}}</p>
                            <p>Adresse mail de l'annonceur : {{$reservation->user->email}}</p>
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