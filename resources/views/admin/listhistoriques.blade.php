@extends('layouts.admin')
@section('content')
<div class="admin-user-profil">
    <div class="container list-category">
        <h2>Historiques de reservations</h2>
        <div class="row">
        @foreach ($historiques as $historique)
            <div class="col-lg-4 col-md-4">
                <div class="thumbnail">
                    <div class="card h-100">
                        <a href="{{action('AdminController@showhistoriques', $historique->id)}}"><img class="img-responsive img_house" src="{{ asset('img/houses/'.$historique->house->photo) }}"></a>
                        <div>
                            <h4 class="title card-title text-center">
                                <a href="{{route('admin.showhistoriques', $historique->id) }}">{{$historique->house->title}}</a>
                            </h4>
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
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection