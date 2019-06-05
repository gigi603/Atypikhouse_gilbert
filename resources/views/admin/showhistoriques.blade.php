@extends('layouts.admin')
@section('content')
<div class="admin-user-profil">
    
        <div class="container list-category">
            <div class="panel panel-default">
                <div class="panel-heading">Détails de l'historique</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="card h-100">
                                    <img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}"></a>
                                    <div class="card-body">
                                        <h4 class="title card-title text-center">
                                            {{$historique->house->title}}
                                        </h4>
                                        <h3 class="price">{{$historique->house->price}}€</h3>
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
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection