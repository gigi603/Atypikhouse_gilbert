@extends('layouts.app')
@section('title', 'Nos Historiques')
@section('content')
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
                        <p class="price">Total payé: {{$historique->total}}€ pour {{$historique->nb_personnes}} personne(s)</p>
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
                            <p> Adresse: {{$historique->house->adresse}}</p>
                        <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                        <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
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
    </div>
    @endforeach
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
@endsection