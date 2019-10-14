@extends('layouts.app')
@section('title', 'Nos Hébergements')
@section('content')
@section('content')
<div class="container annonces-block" role="annonces">
    <h2 class="text-center h2-title">Mes hébergements</h2>
    <div class="row">
        <a href="{{route('house.create_step1')}}" class="btn btn-primary btn-color">Ajouter une annonce</a>
    </div>
    <div class="row">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <p>{!! \Session::get('success') !!}</p>
                </ul>
            </div>
        @endif
    @foreach ($houses as $house)
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-hebergement">
                    <a href="{{action('UsersController@showhebergements', $house['id'])}}"><img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}"></a>
                    <h4 class="title card-title">
                        <a href="{{route('user.showhebergements', $house['id']) }}">{{$house->title}}</a>
                    </h4>
                    <p class="price">{{$house->price}}€ par nuit</p>
                
                    <p>Type de bien : {{$house->category->category}}</p>     
                    <p><?php echo(substr($house->description, 0, 40));?></p>   
                    <p>Annulation gratuite !</p>
                    <p> Adresse: {{$house->adresse}}</p>
                    @if($house->statut == "En attente de validation")
                        <p>Statut: <span style="color:red;"><?php echo($house->statut);?></span></p>
                    @else
                        <p>Statut: <span style="color:green;"><?php echo($house->statut);?></span></p>
                    @endif    
                    <div class="col-md-12 text-center">
                        <a href="{{route('user.editHouse', $house['id']) }}" class="btn btn-primary btn-color">Modifier</a>
                        <a href="{{route('user.deleteHouse', $house['id']) }}" class="btn btn-danger delete-annonce">Supprimer</a>
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