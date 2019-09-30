@extends('layouts.app')
@section('title', 'Nos Réservations')
@section('content')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
@section('content')
<div class="container list-category margin-top" role="reservations">
    <h2 class="h2-title">Mes réservations</h2>
    <div class="row">
    @foreach ($reservations as $reservation)
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-show h-100">
                    <a href="{{action('UsersController@showreservations', $reservation['id'])}}"><img class="img-responsive img_house" src="{{ asset('img/houses/'.$reservation->house->photo) }}" alt="Hébergement insolite - {{$reservation->house->title}}"></a>
                    <div>
                        <h4 class="title card-title text-center">
                            <a href="{{route('user.showreservations', $reservation['id']) }}">{{$reservation->house->title}}</a>
                        </h4>
                        <p class="price">Total payé: {{$reservation->total}}€ pour {{$reservation->nb_personnes}} personne(s)</p>
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
                        @if($reservation->house->statut == "En attente de validation")
                            <p>Statut: <span style="color:red;"><?php echo($reservation->house->statut);?></span></p>
                        @else
                            <p>Statut: <span style="color:green;"><?php echo($reservation->house->statut);?></span></p>
                        @endif
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
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection