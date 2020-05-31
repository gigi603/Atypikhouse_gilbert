@extends('layouts.app')
@section('title', 'Etape 3')
@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page3') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step3')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>3. Décrivez nous votre bien et les disponibilités</p>                     
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Titre de votre bien</label>
                                <div class="col-md-6">
                                    <input id="name" required type="text" class="form-control" name="title" maxlength="40" value="{{$title}}">
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
                                    <select id="select_category" required name="category_id" class="form-control">
                                        <option id="" value="" autofocus>Choisissez votre categorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}" {{ ($category == $categorie->id) ? "selected" : "" }}><?php echo($categorie->category);?></option>
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
                            <div class="form-group{{ $errors->has('nb_personnes') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre de personnes</label>
                                <div class="col-md-6">
                                    <select id="select_nb_personnes" required name="nb_personnes" class="form-control">
                                        <option id="" value="" autofocus>Nombre de personnes</option>
                                        @for($i=1;$i<17;$i++)
                                            <option value="{{ ($i > 16 || $i < 0) ? "" : $i }}" {{ ($i == $nb_personnes) ? "selected" : "" }}>{{$i}}</option>
                                        @endfor 
                                    </select>
                                    @if ($errors->has('nb_personnes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nb_personnes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Date de début</label>
                                <div class="col-md-6">
                                    <input type="text" required class="form-control" id="from" placeholder="Date de début" name="start_date" value="{{$start_date}}" />
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
                                    <input type="text" required class="form-control" id="to" placeholder="Date de fin" name="end_date" value="{{$end_date}}" />
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" rows="5" placeholder="Ne pas saisir plus de 500 caractères">{{$description}}</textarea>
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
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>let site = "{{env('APP_URL_SITE')}}";</script>
    <script src="{{ asset('js/calendarCreateAnnonce.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
@endsection


