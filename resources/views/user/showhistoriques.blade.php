@extends('layouts.app')
@section('title', 'Détail de l"annonde')
@section('content')
<div class="admin-user-profil"> 
    <div class="container list-category" role="details-historique">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de l'annonce</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-show h-100">
                                <img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}" alt="Hébergement insolite - {{$historique->house->title}}"></a>
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        <a href="#">{{$historique->house->title}}</a>
                                    </h4>
                                    <h3 class="price">{{$historique->total}}€</h3>
                                    <p>Type de bien : {{$historique->house->category->category}}</p>
                                    @foreach($historique->house->valuecatproprietes as $valuecatpropriete)
                                        @if($valuecatpropriete->value == 0)
                                        @else
                                            <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                        @endif                                 
                                    @endforeach
                                    <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                    <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                                    <p class="card-text">{{$historique->house->description}}</p>
                                    <p>Annulation gratuite !</p>
                                    <p> Pays: {{$historique->house->pays}}</p>
                                    <p> Ville: {{$historique->house->ville}}</p>
                                    <p> Adresse: {{$historique->house->adresse}}</p>
                                    <p> Téléphone: {{$historique->house->telephone}}</p>
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