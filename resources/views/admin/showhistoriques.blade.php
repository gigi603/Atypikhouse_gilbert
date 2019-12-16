@extends('layouts.admin')
@section('title', "Détails de la réservation passée")
@section('content')
<div class="admin-user-profil">
    @if (Session::has('success-valide'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success-valide') }}
    </div>
    @endif
    <div class="container list-category">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de la réservation passée</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="text-center">
                                <img src="{{ asset('img/houses/'.$historique->house->photo) }}">
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        {{$historique->house->title}}
                                    </h4>
                                    <div class="block-description">
                                        <h3 class="price">Total payé: {{$historique->total}}€ pour {{$historique->nb_personnes}} personnes</h3>
                                        <p>Type de bien : {{$historique->house->category->category}}</p>
                                        @foreach($historique->house->valuecatproprietes as $valuecatpropriete)
                                            @if($valuecatpropriete->value == 0)
                                            @else
                                                <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                            @endif                                 
                                        @endforeach
                                        <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                                        <p class="card-text">{{$historique->house->description}}</p>
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
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
@endsection