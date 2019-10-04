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
@endsection