@extends('layouts.app')
@section('title', 'Etape 1')
@section('footer', 'footer_absolute')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page1') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step1')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <p>1. Où se situe votre bien?</p>

                        <div class="form-group{{ $errors->has('pays') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pays</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="pays" onkeyup="this.value=this.value.toUpperCase()" placeholder="Saisir le pays" autofocus value="{{ old('pays') }}">
                                @if ($errors->has('pays'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pays') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ville, département ou région</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="ville" onkeyup="this.value=this.value.toUpperCase()" placeholder="Saisir la ville" autofocus value="{{ old('ville') }}">
                                @if ($errors->has('ville'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Adresse</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="adresse" onkeyup="this.value=this.value.toUpperCase()" placeholder="Saisir l'adresse" autofocus value="{{ old('adresse') }}">
                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Téléphone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" placeholder="Saisir un numéro de téléphone" autofocus value="{{ old('telephone') }}">
                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="hidden" class="form-control" name="user_id" required autofocus value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color">
                                    Continuer
                                </button>
                            </div>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/create_house.js') }}"></script>
<!--<script src="{{ asset('js/proprietes.js') }}"></script>-->

