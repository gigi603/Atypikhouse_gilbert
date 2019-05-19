@extends('layouts.app')
@section('title', 'Détails de l"annonce')
@section('content')
<div class="admin-user-profil">   
    <div class="container list-category" role="details-reservation">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de l'annonce</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-show h-100">
                                <img class="img-responsive img_house" src="{{ asset('img/houses/'.$reservation->house->photo) }}" alt="Hébergement insolite - {{$house->title}}"></a>
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        <a href="#">{{$reservation->house->title}}</a>
                                    </h4>
                                    <h3 class="price">{{$reservation->house->price}}€</h3>
                                    <p>Type de bien : {{$reservation->house->category->category}}</p>
                                    @foreach($reservation->house->valuecatproprietes as $valuecatpropriete)
                                        @if($valuecatpropriete->value == 0)
                                        @else
                                            <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                        @endif                                 
                                    @endforeach
                                    <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                        <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                                    <p class="card-text">{{$reservation->house->description}}</p>
                                    <p>Annulation gratuite !</p>
                                    <p> {{$reservation->house->ville}}</p>
                                    <p> {{$reservation->house->adresse}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection