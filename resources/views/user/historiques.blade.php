@extends('layouts.app')
@section('title', 'Nos Historiques')
@section('content')
@section('content')
<div class="container-fluid block-container block-size" role="historiques">
    <h1 class="h1-title">Mes réservations passées</h1>
    <div class="row">
        @foreach ($historiques as $historique)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                <div class="card-houses h-100">       
                    <a href="{{action('UsersController@showhistoriques', $historique->id)}}"><img class="img-houses-list" src="{{ asset('img/houses/'.$historique->house->photo) }}" alt="Hébergement insolite - {{$historique->house->title}}"></a>
                    <div class="card-block">
                        <div class="card-body">
                            <h2 class="card-title title-houses"><a href="{{route('user.showhistoriques', $historique->id) }}">{{$historique->house->title}}</a></h2>
                        </div>
                        <p class="price">Total payé: {{$historique->total}}€ <br> pour {{$historique->nb_personnes}} personne(s)</p>
                        <div class="card-infos">
                            <p>Type de bien : {{$historique->house->category->category}}</p>
                            @foreach($historique->house->valuecatproprietes as $valuecatpropriete)
                                @if($loop->iteration > 0)
                                    @if($valuecatpropriete->value == 0)
                                    @else
                                        <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                    @endif
                                @break   
                                @endif      
                            @endforeach      
                            <p><?php echo(substr($historique->house->description, 0, 40));?></p>   
                            <p>Annulation gratuite !</p>
                            <p class="title-houses"> Adresse: {{$historique->house->adresse}}</p> 
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text"><?php echo(substr($historique->house->description, 0, 40));?></p>
                            @if($historique->reserved == 1)
                                <p>Statut: <span style="color:green;">Réservé</span></p>
                            @else
                                <p>Statut: <span style="color:red;">Annulée</span></p>
                            @endif
                            <!--<div class="text-center"><a href="{{route('user.showhistoriques', $historique['id']) }}" class="btn btn-primary btn-color">Voir</a></div>-->
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