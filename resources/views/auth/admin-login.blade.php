@extends('layouts.admin-login')
@section('title', "Connexion pour l'admin")
@section('content')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Administrateurs, connectez-vous</div>
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Mot de passe</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-color">
                            Connexion
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
