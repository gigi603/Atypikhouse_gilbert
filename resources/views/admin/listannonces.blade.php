@extends('layouts.admin')
@section('content')
<div class="admin-user-profil">
    <div class="col-offset-md-2 col-md-10 right">
        @foreach($users as $user)
            <div class="panel panel-default">
                <div class="panel-heading text-center">Annonces de {{$user->nom}} {{$user->prenom}}</div>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <p>{!! \Session::get('success') !!}</p>
                        </ul>
                    </div>
                @endif
                @foreach ($houses as $house)           
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 mb-4 thumbnail card-admin">
                                <div class="card h-100">
                                    <img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}">
                                    <div>
                                        <h4 class="title card-title">
                                            <a href="{{route('admin.showannonces', $house['id']) }}">{{$house->title}}</a>
                                        </h4>
                                        <p class="price">{{$house->price}}€ par nuit</p>
                                        <div class="card-infos">
                                            <p>Type de bien : {{$house->category->category}}</p>
                                            @foreach($house->valuecatproprietes as $valuecatpropriete)
                                            @if($loop->iteration > 0)
                                                @if(count($valuecatpropriete) != 0)
                                                    <p>{{$valuecatpropriete->propriete->propriete}}</p> 
                                                @endif
                                            @break   
                                            @endif      
                                        @endforeach      
                                            <p><?php echo(substr($house->description, 0, 40));?></p>   
                                            <p>Annulation gratuite !</p>
                                            <p> Location : {{$house->adresse}}</p>
                                        @if($house->statut == "En attente de validation")
                                            <p>Statut: <span style="color:red;"><?php echo($house->statut);?></span></p>
                                        @else
                                            <p>Statut: <span style="color:green;"><?php echo($house->statut);?></span></p>
                                        @endif
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <a href="{{route('admin.editHouse', $house['id']) }}" class="btn btn-primary btn-color">Modifier</a>
                                                    <a href="{{route('admin.deleteAnnonce', $house['id']) }}" class="btn btn-danger delete-annonce">Supprimer</a>
                                                </div>
                                            </div>                      
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>