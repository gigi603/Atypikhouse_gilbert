@extends('layouts.app')
@section('title', 'Nos Réservations')
@section('content')
<div class="container-fluid block-container block-size" role="reservations">
    <h1 class="h1-title" id="hebergements">Mes réservations</h1>
    <div class="row">
        @foreach ($reservations as $reservation)
            @if($reservation->house->statut == "Validé")
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                    <div class="card-houses h-100">       
                        <a href="{{action('UsersController@showreservations', $reservation['id'])}}"><img class="img-houses-list" src="{{ asset('img/houses/'.$reservation->house->photo) }}" alt="Hébergement insolite - {{$reservation->house->title}}"></a>
                        <div class="card-block">
                            <div class="card-body">
                                <h2 class="card-title title-houses"><a href="{{route('user.showreservations', $reservation['id']) }}"> {{$reservation->house->title}} </a></h2>
                            </div>
                            <p class="price">Total payé: {{$reservation->total}}€<br> pour {{$reservation->nb_personnes}} personne(s)</p>
                            <p>Type de bien : {{$reservation->house->category->category}}</p>
                            <p class="title-houses"> Adresse: {{$reservation->house->adresse}}</p>
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            @if($reservation->reserved == 1)
                                <p>Statut: <span style="color:green;">Réservé</span></p>
                                <div class="text-center">
                                    <a href="{{route('user.cancelreservation', $reservation['id']) }}" class="btn btn-danger delete-reservation">Annuler ma réservation</a>
                                </div>
                            @else
                                <p>Statut: <span style="color:red;">Annulée</span></p>
                            @endif
                            <!-- <div class="text-center"><a href="{{route('user.showreservations', $reservation['id']) }}" class="btn btn-primary btn-color">Voir</a></div>-->
                            </div>
                        
                    </div>
                </div>
            @endif  
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
@endsection