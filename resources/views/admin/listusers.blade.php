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
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection