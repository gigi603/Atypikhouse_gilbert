@extends('layouts.app')
@section('footer', 'Etape 3')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page4') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step3')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <p>3. Quel est le montant de votre bien ?</p>
                            
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prix la nuit</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="price" autofocus value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                             
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-color">
                                Continuer
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>         
</div> 
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/create_house.js') }}"></script>  