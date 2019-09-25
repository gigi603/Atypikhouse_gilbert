@extends('layouts.app')
@section('title', 'Nos Historiques')
@section('content')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
@section('content')
<div class="container list-category margin-top" role="historiques">
    <h2 class="h2-title">Mes historiques</h2>
    <div class="row">
    @foreach ($historiques as $historique)
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-show h-100">
                    <a href="{{action('UsersController@showhistoriques', $historique->id)}}"><img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}" alt="Hébergement insolite - {{$historique->house->title}}"></a>
                    <div>
                        <h3 class="title card-title text-center">
                            <a href="{{route('user.showhistoriques', $historique->id) }}">{{$historique->house->title}}</a>
                        </h3>
                        <p>Type de bien : Logement</p>
                        <p><i class="fas fa-bed"></i> : 2 lits - <i class="fas fa-users"></i> : pour 2 Personnes</p>
                        <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                        <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                        <p class="price">{{$historique->total}}€</p>
                        <p class="card-text"><?php echo(substr($historique->house->description, 0, 40));?></p>
                        @if($historique->house->statut == "En attente de validation")
                            <p>Statut: <span style="color:red;"><?php echo($historique->house->statut);?></span></p>
                        @else
                            <p>Statut: <span style="color:green;"><?php echo($historique->house->statut);?></span></p>
                        @endif
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