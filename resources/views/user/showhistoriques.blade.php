@extends('layouts.app')
@section('title', 'Détails de l"annonce')
@section('content')
<div class="admin-user-profil">   
    <div class="container list-category" role="details-reservation">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de l'historique</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-show h-100">
                                <img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}" alt="Hébergement insolite - {{$historique->house->title}}"></a>
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        <a href="#">{{$historique->house->title}}</a>
                                    </h4>
                                    <h3 class="price">Total payé: {{$historique->total}}€ pour {{$historique->nb_personnes}} personnes</h3>
                                    <p>Type de bien : {{$historique->house->category->category}}</p>
                                    @foreach($historique->house->valuecatproprietes as $valuecatpropriete)
                                        @if($valuecatpropriete->value == 0)
                                        @else
                                            <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                        @endif                                 
                                    @endforeach
                                    <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                        <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                                    <p class="card-text">{{$historique->house->description}}</p>
                                    <p>Annulation gratuite !</p>
                                    <p> Adresse: {{$historique->house->adresse}}</p>
                                    <p>Téléphone de l'annonceur : {{$historique->house->telephone}}</p>
                                    <p>Adresse mail de l'annonceur : {{$historique->user->email}}</p>
                                </div>
                            </div>
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