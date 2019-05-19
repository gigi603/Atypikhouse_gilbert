@extends('layouts.app')
@section('title', 'Utilisateur')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier</div>
                {{-- @foreach($houses as $house) --}}
                <div class="panel-body">
                    @if ($success = Session::get('success'))
                        <div class="alert alert-info">
                            {{ $success }}
                        </div>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('user.updateHouse', $house->id) }}" enctype="multipart/form-data">                      
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Titre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="title" maxlength="47" autofocus value="{{$house->title}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Categorie</label>
                            <div class="col-md-6">
                                <select id="select_category" type="text" name="category_id" class="form-control">
                                    <option id="" value="{{$house->category->id}}" selected="selected" required autofocus>{{$house->category->category}}</option>
                                    @foreach($categories as $category)
                                        <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pays') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Pays</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pays" autofocus value="{{$house->pays}}">
                                @if ($errors->has('pays'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pays') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ville') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Ville</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ville" autofocus value="{{$house->ville}}">
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
                                <input type="text" class="form-control" name="adresse" autofocus value="{{$house->adresse}}">
                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prix</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="price" autofocus value="{{$house->price}}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Photo</label>
                            
                            <div class="col-md-6">
                                <img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label class="col-md-4"></label>
                            <div class="col-md-6">
                            <input id="name" type="file" class="form-control" name="photo" autofocus value="{{$house->photo}}">
                            @if ($errors->has('photo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" rows="5">{{$house->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="text-center">Informations supplémentaires:</label>
                        </div>
                        @foreach($house->valuecatproprietes as $valuecatproprietes)
                            <div class="form-group{{ $errors->has('propriete[]') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">{{$valuecatproprietes->propriete->propriete}}</label>
                                <input type="hidden" id="propriete" class="form-control" name="propriete_id[]" autofocus value="{{$valuecatproprietes->propriete->id}}">
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="propriete[]" required autofocus value="{{$valuecatproprietes->value}}">
                                    @if ($errors->has('propriete[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('propriete[]') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        @endforeach
                        
                        <div class="form-group">
                            <p class="rouge">Pour les informations supplémentaires vous ne pouvez mettre que des chiffres. </p>
                            <p class="rouge">mettez 0 losque vous n'avez pas ou si vous ne savez pas encore, la propriété ne sera pas afficher dans l'annonce</p>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-color">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                {{-- @endforeach     --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/edit_house.js') }}"></script>
