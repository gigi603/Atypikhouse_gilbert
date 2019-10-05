@extends('layouts.admin')
@section('content')
<div class="admin-user-profil"> 
@section('content')
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading">Messages envoyés à l'utilisateur</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($messages as $message)
                        <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                            <div class="panel-body">
                                <div class="col-sm-9">
                                    {{ $message->content }}
                                </div>
                                <div class="col-sm-3 text-right">
                                    @if($message->user_id != "0")
                                        <small>Envoyé par {{ $message->admin->name }}</small><br/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                        <div class="panel-body">
                            <form action="{{ route('admin.addMessage') }}" method="POST" style="display: flex;">
                                {{ csrf_field() }}
                                <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="text" name="content" placeholder="Saisir votre message" class="form-control" id="input_comment" style="border-radius: 0;">
                                <input type="submit" value="Envoyer" class="btn btn-primary btn-color" style="border-radius: 0;">
                            </form>
                            @if (@count($errors) > 0)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>