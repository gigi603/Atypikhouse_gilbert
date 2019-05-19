@extends('layouts.admin')
@section('content')
<div class="admin-user-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Message de {{$post->name}}</div>
                    
                    <div class="panel-body card-message">
                        <p>Email: {{$post->email}}</p>
                        <p>{{$post->content}}</p>                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>