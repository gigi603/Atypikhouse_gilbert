@extends('layouts.admin')
@section('title', "Détails de l'annonce")
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Annonces de {{$user->prenom}} {{$user->nom}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th> Actions</th>
                </tr>
                </thead>
                @foreach($houses as $house)
                <tbody>
                    <tr>
                        <td>{{$house->title}}</td>
                        <td><?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('l j F Y'); echo($startdate);?></td>
                        <td><?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('l j F Y'); echo($enddate);?></td>
                        <td><a href="{{action('AdminController@showannonces', $user->id)}}" class="btn btn-primary">Voir</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection