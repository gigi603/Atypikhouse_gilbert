@extends('layouts.app')
@section('title', 'Nos Réservations')
@section('content')
<div class="container-fluid block-container block-size" role="reservations-annulees">
    <h1 class="h1-title" id="hebergements">Mes réservations annulées</h1>
    <div class="row">
        @foreach ($reservations as $reservation)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                <div class="card-houses h-100">       
                    <a href="{{action('UsersController@showreservationsannulees', $reservation['id'])}}"><img class="img-houses-list" src="{{ asset('img/houses/'.$reservation->house->photo) }}" alt="Hébergement insolite - {{$reservation->house->title}}"></a>
                    <div class="card-block">
                        <div class="card-body">
                            <h2 class="card-title title-houses"><a href="{{route('user.showreservationsannulees', $reservation['id']) }}"> {{$reservation->house->title}} </a></h2>
                        </div>
                        <p class="price">Total payé: {{$reservation->total}}€ <br> pour {{$reservation->nb_personnes}} personne(s)</p>
                        <div class="card-infos">
                            <p>Type de bien : {{$reservation->house->category->category}}</p>
                            @foreach($reservation->house->valuecatproprietes as $valuecatpropriete)
                                @if($loop->iteration > 0)
                                    @if($valuecatpropriete->value == 0)
                                    @else
                                        <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                    @endif
                                @break   
                                @endif      
                            @endforeach      
                            <p><?php echo(substr($reservation->house->description, 0, 40));?></p>   
                            <p>Annulation gratuite !</p>
                            <p> Adresse: {{$reservation->house->adresse}}</p>
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text"><?php echo(substr($reservation->house->description, 0, 40));?></p>
                            <p>Statut: <span style="color:red;">Annulée</span></p>
                            <div class="text-center">
                                <a href="{{route('user.showreservationsannulees', $reservation['id']) }}" class="btn btn-primary btn-color">Voir</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
@endsection