@extends('layouts.admin')
@section('title', 'Profil')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-circle"></i>
          Profil de {{$user->nom}} {{$user->prenom}}
    </div>
    <div class="card-body">    
        <div class="row">                                      
            <div class="col-md-12">
                <label for="name" class="control-label">Nom : {{$user->nom}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="name" class="control-label">Prénom : {{$user->prenom}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="name" class="control-label">Email : {{$user->email}}</label>
            </div>
        </div>
    </div>
</div>
@endsection