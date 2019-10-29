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
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td>$320,800</td>
            </tr>
            <tr>
              <td>Garrett Winters</td>
              <td>Accountant</td>
              <td>Tokyo</td>
              <td>63</td>
              <td>2011/07/25</td>
              <td>$170,750</td>
            </tr>
            <tr>
              <td>Ashton Cox</td>
              <td>Junior Technical Author</td>
              <td>San Francisco</td>
              <td>66</td>
              <td>2009/01/12</td>
              <td>$86,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
@endsection