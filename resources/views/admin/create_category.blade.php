
@extends('layouts.admin')
@section('title', 'Annonces')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des annonces
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th> Type d'annonce</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Annonceur</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($houses as $house)  
                        <tbody>
                            <tr>
                                <td style="width:250px"><img src="{{ asset('img/houses/'.$house->photo) }}" class="photo-size"/></td>
                                <td>{{$house->title}}</td>
                                <td>{{$house->category->category}}
                                <td>{{$house->start_date}}</td>
                                <td>{{$house->end_date}}</td>
                                <td>{{$house->user->prenom}} {{$house->user->nom}}</td>
                                <td>{{$house->statut}}</td>
                                <td><a href="{{action('AdminController@showannonces', $house->user->id)}}" class="btn btn-primary btn-tableau">Voir</a><br/>
                                <a href="{{action('AdminController@disableHouse', $house->user->id)}}" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>         
            </div>
        </div>
    </div>
@endsection