@extends('layouts.admin')
@section('title', 'Détails du message')
@section('content')
<div class="admin-user-profil">
    @if (Session::has('success-valide'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('success-valide') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Message</div>
                    
                    <div class="panel-body card-message">
                        <p>Nom / Prénom: {{$post->name}}</p>
                        <p>Email: {{$post->email}}</p>
                        <p>{{$post->content}}</p>                           
                    </div>
                </div>
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <form action="{{ route('admin.addMessage', $post->user_id) }}" method="POST" style="display: flex;">
                                
                                {{ csrf_field() }}
                                <input type="text" name="content" placeholder="Saisir un message" class="form-control" id="input_comment" style="border-radius: 0;">
                                <input type="submit" value="Envoyer" class="btn btn-primary btn-color" style="border-radius: 0;">
                            </form>
                            @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection