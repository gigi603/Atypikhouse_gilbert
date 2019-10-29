@extends('layouts.admin')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-circle"></i>
          Profil de {{$user->nom}} {{$user->prenom}}
    </div>
    <div class="card-body">    
        <div class="row">                                      
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Nom : </label>
                <div class="col-md-2">
                    {{$user->nom}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Prénom : </label>
                <div class="col-md-2">
                    {{$user->prenom}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Email : </label>
                <div class="col-md-2">
                    {{$user->email}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">Téléphone : </label>
                <div class="col-md-2">
                    {{$user->telephone}}
                </div>
            </div>
        </div>
        <a href="{{route('admin.listcomments', $user->id)}}" class="btn btn-primary">Voir ses commentaires</a>
    </div>
</div>
@endsection