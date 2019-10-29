@extends('layouts.admin')
@section('content')
<div id="utilisateur">
    <h2>Utilisateurs : </h2>
    @foreach($users as $user)
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href="{{action('AdminController@profilUser', $user['id'])}}">{{$user->nom}} {{$user->prenom}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>Compte activé : {{$user->statut}}</td>
                    <td>
                        <a href="{{action('AdminController@profilUser', $user['id'])}}" class="btn btn-success">Voir ses annonces/ autres informations</a>
                    </td>
                    @if($user->statut ==  1)
                        <td>
                            <a href="{{ route('admin.disable_user', $user->id) }}" class="delete-user btn btn-danger">Désactiver le compte</a>
                        </td>
                    @else
                        <td>
                            <a href="{{ route('admin.activate_user', $user->id) }}" class="btn btn-success">Activer le compte</a>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</div>



<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Liste des utilisateurs</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Compte activé</th>
              <th>Etat</th>
              <th> Actions</th>
            </tr>
          </thead>
          @foreach($users as $user)
            <tbody>
                <tr>
                    <td><a href="{{action('AdminController@profilUser', $user['id'])}}">{{$user->nom}} {{$user->prenom}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->statut}}</td>
                    <td>
                        <a href="{{action('AdminController@profilUser', $user['id'])}}" class="btn btn-success">Voir ses annonces/ autres informations</a>
                    </td>
                    @if($user->statut ==  1)
                        <td>
                            <a href="{{ route('admin.disable_user', $user->id) }}" class="delete-user btn btn-danger">Désactiver le compte</a>
                        </td>
                    @else
                        <td>
                            <a href="{{ route('admin.activate_user', $user->id) }}" class="btn btn-success">Activer le compte</a>
                        </td>
                    @endif
                </tr>
            </tbody>
            @endforeach
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
@endsection