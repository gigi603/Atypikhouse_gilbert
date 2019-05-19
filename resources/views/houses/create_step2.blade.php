@extends('layouts.app')
@section('title', 'Etape 2')
@section('footer', 'footer_absolute')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page2') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step2')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>2. Décrivez nous votre bien</p>                     
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Titre de votre bien</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" maxlength="40" autofocus value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Categorie</label>
                                <div class="col-md-6">
                                    <select id="select_category" name="category_id" class="form-control">
                                        <option id="" value="0" autofocus>Choisissez votre categorie</option>
                                        @foreach($categories as $category)
                                            <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="proprietes"></div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" rows="5" placeholder="Ne pas saisir plus de 500 caractères">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
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


