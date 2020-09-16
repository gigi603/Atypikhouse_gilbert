@extends('layouts.app')
@section('title', 'Utilisateur')
@section('footer', 'footer_absolute')
@section('content')
<div class="container margin-top block-size" role="mon profil">
    <h1 class="h1-title">Mon profil</h1>
    <div class="row">
        <div class="container">
            <div class="block">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <form class="form-horizontal" method="POST" action="{{action('UsersController@edit', Auth::user()->id)}}" enctype="multipart/form-data">                      
                                {{ csrf_field() }}
                                <h4>
                                {{Auth::user()->prenom}} {{Auth::user()->nom}}</h4>
                                <p>
                                    <i class="glyphicon glyphicon-envelope"></i>{{Auth::user()->email}}
                                </p>
                                <br>
                                <p>
                                <div class="form-check{{ $errors->has('newsletter') ? ' has-error' : '' }}">
                                    <input type="checkbox" class="form-check-input" name="newsletter" value="1" {{(Auth::user()->newsletter == 1 ? 'checked' : '')}}>
                                    <label class="form-check-label" for="exampleCheck1">Recevoir les newsletters</label>
                                    @if ($errors->has('newsletter'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('newsletter') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </p>
                                <button class="btn btn-primary btn-color">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection