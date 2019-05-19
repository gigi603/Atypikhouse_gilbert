@extends('layouts.admin')
@section('content')
<div class="admin-user-profil">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-offset-md-2 col-md-10">
                <div class="panel panel-default">
                @foreach ($users as $user)
                    <div class="panel-heading">Profil de {{$user->nom}} {{$user->prenom}}</div>
                    <div class="panel-body">       
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
                            <div class="col-md-3">
                                <a href="{{route('admin.listreservations', $user['id']) }}" class="btn btn-success button-profiluser">Ses réservations</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('admin.listhistoriques', $user['id']) }}" class="btn btn-success button-profiluser">Ses historiques de reservations</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('admin.listannonces', $user['id']) }}" class="btn btn-success button-profiluser">Ses annonces</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{route('admin.listcomments', $user['id']) }}" class="btn btn-success button-profiluser">Ses commentaires</a>
                            </div>
                            <div class="col-md-2">
                                    <a href="{{route('admin.user_messages', $user['id']) }}" class="btn btn-success button-profiluser">Ses notifications</a>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>