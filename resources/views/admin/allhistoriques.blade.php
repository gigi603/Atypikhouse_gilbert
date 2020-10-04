@extends('layouts.admin')
@section('title', 'Reservations passées')
@section('content')

    <div class="card mb-3">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="card-header">
            <h1 style="font-size:20px">
            <i class="fas fa-table"></i>
            Liste des réservations passées
            </h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Annonceur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach ($historiques as $historique)  
                        <tbody>
                            <tr>
                                <td style="width:250px"><img src="{{ asset('img/houses/'.$historique->house->photo) }}" class="photo-size"/></td>
                                <td>{{$historique->house->title}}</td>
                                <td><?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?></td>
                                <td><?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></td>
                                <td>{{$historique->user->prenom}} {{$historique->user->nom}}</td>
                                <td><a href="{{action('AdminController@showhistoriques', $historique->id)}}" class="btn btn-primary btn-tableau">Voir</a><br/>
                            </tr>
                        </tbody>
                    @endforeach
                </table>         
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
@endsection