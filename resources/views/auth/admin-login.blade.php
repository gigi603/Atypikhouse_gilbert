@extends('layouts.admin-login')
@section('title', "Connexion pour l'admin")
@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Administrateurs, connectez-vous</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="form-label-group">
                        <input id="inputEmail" type="email" class="form-control" name="email" required="required" autofocus="autofocus">
                        <label for="inputEmail">Email</label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="form-label-group">
                        <input id="inputPassword" type="password" class="form-control" name="password" required>
                        <label for="inputPassword">Mot de passe</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Connexion"/>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

