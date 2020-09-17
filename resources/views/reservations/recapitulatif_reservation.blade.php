@extends('layouts.app')
@section('title', 'Recapitulatif réservation')
@section('link')
@section('content')
<div class="container margin-top">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Récapitulatif de votre réservation</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                            <p class="card-text">Vous êtes sur le point de réserver pour le <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> au <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text"> à l'adresse: {{$house->adresse}}</p>
                            <p class="card-text">Voici le récapitulatif de l'hebergement que vous avez choisi : </p>
                            <img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}"></a>
                            <div class="card-show">
                                <h4 class="title card-title">
                                    <a href="#">{{$house->title}}</a>
                                </h4>
                                <p>Type de bien : {{$house->category->category}}</p>
                                @foreach($house->valuecatproprietes as $valuecatpropriete)                                  
                                    <p>{{$valuecatpropriete->propriete->propriete}}</p>                     
                                @endforeach
                                <p class="card-">{{$house->description}}</p>
                                <p>Annulation gratuite !</p>
                                <p> {{$house->ville}}</p>
                                <h3 class="price">Prix: {{$house->price}} € x {{$days}} jours pour {{$reservation->nb_personnes}} personne(s)</h3>
                                <h3 class="price">Total à payer : {{$total}} €</h3>
                                <p> Si vous voulez réserver cet hébergement veuillez continuer en cliquant sur le bouton ci-dessous</p>
                                <a class="btn btn-success btn_reserve" href="{{action('ReservationsController@payWithStripe'
                                    // [
                                    //     'prix' => $house->price,
                                    //     'start' => $reservation->start_date,
                                    //     'end' => $reservation->end_date,
                                    //     'nb_personnes' => $reservation->nb_personnes,
                                    //     'days' => $days,
                                    //     'total' => $total,
                                    //     'user_id' => $reservation->user_id,
                                    //     'house_id' => $reservation->house_id,
                                    //     'category_id' => $reservation->category_id,
                                    //     'reservation_id' => $reservation->id
                                    // ]
                                    )}}">Aller au paiement</a>
                                </div>
                            <div>
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
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
@endsection