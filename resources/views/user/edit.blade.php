@extends('layouts.app')
@section('title', 'Utilisateur')
@section('content')

<div class="container margin-top">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier</div>
                {{-- @foreach($houses as $house) --}}
                <div class="panel-body">
                    @if ($success = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $success }}
                        </div>
                    @endif
                    @if ($danger = Session::get('danger'))
                        <div class="alert alert-danger">
                            {{ $danger }}
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
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Categorie</label>
                            <div class="col-md-6">
                                <select id="select_category" required name="category_id" class="form-control">
                                    <option id="" value="">Choisissez votre categorie</option>
                                    @foreach($categories as $category)
                                        @if($category->id > 1)
                                            <option {{ $categorySelected == $category->id ? "selected" : "" }} value="{{$category->id}}">{{$category->category}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="proprietes"></div>
                        <div class="form-group{{ $errors->has('nb_personnes') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de personnes</label>
                            <div class="col-md-6">
                                <select id="select_nb_personnes" name="nb_personnes" class="form-control">
                                    <option id="" value="{{$house->nb_personnes}}" selected="selected" required autofocus>{{$house->nb_personnes}}</option>
                                    @for($i=1;$i<16;$i++)
                                    <option value={{$i}} @if (old('nb_personnes') == $i) selected="selected" @endif>{{$i}}</option>
                                    @endfor 
                                </select>
                                @if ($errors->has('nb_personnes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nb_personnes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Adresse</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="autocompleteadresse" name="adresse" autofocus value="{{$house->adresse}}">
                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input id="house_id" value="{{$house->id}}" hidden>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prix / la nuit</label>
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
                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Date de début</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="from" placeholder="Date de début" name="start_date" value="<?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('d/m/Y'); echo($startdate);?>" />
                                {{-- <input id="name" type="text" class="form-control" name="start_date" maxlength="40" autofocus value="{{ old('start_date') }}"> --}}
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Date de fin</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="to" placeholder="Date de fin" name="end_date" value="<?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('d/m/Y'); echo($enddate);?>" />
                                {{-- <input id="name" type="text" class="form-control" name="end_date" maxlength="40" autofocus value="{{ old('end_date') }}"> --}}
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
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
@section('script')
    <script>let site = "{{ env('APP_URL_SITE') }}"; </script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/calendarCreateAnnonce.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBohiwddVUwXAr6a8oVcN59JBkyoB7bCU&libraries=places&language=fr"></script>
    <script src="{{ asset('js/autocomplete_address.js') }}"></script>
@endsection
