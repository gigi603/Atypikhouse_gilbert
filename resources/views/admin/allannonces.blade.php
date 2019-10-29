@extends('layouts.admin')
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
                            <th>Statut</th>
                            <th>plus d'infos</th>
                        </tr>
                    </thead>
                    @foreach ($houses as $house)  
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('img/houses/'.$house->photo) }}"/></td>
                                <td>{{$house->title}}</td>
                                <td>{{$house->category->category}}
                                <td>{{$house->start_date}}</td>
                                <td>{{$house->end_date}}</td>
                                <td>{{$house->statut}}</td>
                                <td><a href="{{action('AdminController@showHouse', $user['id'])}}" class="btn btn-primary">voir l'annonce</a></td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>         
            </div>
        </div>
    </div>
@endsection