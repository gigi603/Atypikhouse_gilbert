@extends('layouts.app')
@section('title', 'Détail de l"annonce')
@section('link')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
@section('content')
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Détails de l'annonce</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}" alt="Hébergement insolite - {{$house->title}}"/>
                        <div class="card-show">
                            <h3 class="title card-title">
                                <a href="#">{{$house->title}}</a>
                            </h3>
                            <h4 class="price">{{$house->price}}€ / la nuit</h4>
                            <p>Type de bien : {{$house->category->category}}</p>
                            <p>Disponible du <?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('l j F Y'); echo($startdate);?> au
                            <?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('l j F Y'); echo($enddate);?> </p>
                            <p>Pour {{$house->nb_personnes}} personne(s) maximum</p>
                            @foreach($house->valuecatproprietes as $valuecatpropriete)
                                @if(@count($valuecatpropriete) != 0)
                                    <p>{{$valuecatpropriete->propriete->propriete}}</p>
                   		 @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="calendar panel panel-default">
                        <h4 class="text-center panel-heading">Réserver vos dates : </h4>
                        <form class="form-horizontal" method="POST" action="{{url('reservations')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="house_id" value="{{ $house->id }}">
                                <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                    {!! Form::label('from', 'Départ : ', array('class' => 'formLabel control-label')) !!}
                                    {!! Form::text('start_date', Form::old('from'), array( 
                                        'class' => 'form-control',
                                        'id' => 'from',
                                    )) !!}
                                    @if ($errors->has('start_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('start_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                    {!! Form::label('to', 'Arrivée : ', array('class' => 'formLabel control-label')) !!} 
                                    {!! Form::text('end_date', Form::old('to'), array( 
                                        'class' => 'form-control',
                                        'id' => 'to',
                                    )) !!}
                                    @if ($errors->has('end_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                 
                                <input type="hidden" name="start_date_annonce" id="start_date_annonce" value="{{$house->start_date}}"/>
                                <input type="hidden" name="end_date_annonce" id="end_date_annonce" value="{{$house->end_date}}"/>
                                <div class="form-group{{ $errors->has('nb_personnes') ? ' has-error' : '' }}">
                                    <select id="select_nb_personnes" name="nb_personnes" class="form-control">
                                        <option id="" value="" autofocus>Nombre de personnes</option>
                                        @for($i=1;$i<= $house->nb_personnes;$i++)
                                        <option value={{$i}} @if (old('nb_personnes') == $i) selected="selected" @endif>{{$i}}</option>
                                        @endfor 
                                    </select>
                                    @if ($errors->has('nb_personnes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nb_personnes') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>
                                <input type="hidden" name="house_id" value="{{$house->id}}"/>

                                </div>
                                @if (Auth::check())
                                    {!! Form::submit('Réserver', array('class' => 'btn btn-success btn_reserve')) !!}
                                @else
                                    <a href= "{{ route('login') }}" class="btn btn-success btn_reserve btn-color">Réserver</a>
                                @endif 
                            </form>   
                        </div>
                    </div> 
                    <div class="col-md-12 space-top">
                            <p>{{$house->description}}</p>
                            <p>Annulation gratuite !</p>
                            <p> Adresse: {{$house->adresse}}</p>
                            <p> Téléphone de l'annonceur : {{$house->telephone}}</p>
                            <p> Adresse mail de l'annonceur : {{$house->user->email}}</p>
                    </div>
                </div>
                @foreach ($house->comments as $comment)
                    <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                        <div class="panel-body">
                            <div class="col-sm-9">
                                {{ $comment->comment }}
                            </div>
                            <div class="col-sm-3 text-right">
                                @if($comment->user_id != "0")
                                    <small>Posté par {{ $comment->user->prenom }} {{ $comment->user->nom }}</small><br/>
                                    @if($comment->note != "0")
                                        <small>Note: {{$comment->note}}/5</small>
                                    @endif
                                @else
                                    <small>Posté par {{ $comment->admin->name }}</small><br/>
                                    @if($comment->note != "0")
                                        <small>Note: {{$comment->note}}/5</small> 
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach 
                @if (Auth::check())
                    @if($client_reserved->count() > 0 OR $house->user_id == Auth::user()->id)
                    <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                        <div class="panel-body">
                            <form action="{{ url('/comments') }}" method="POST" style="display: flex;">
                                {{ csrf_field() }}
                                <input type="hidden" name="house_id" value="{{ $house->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="admin_id" value="0">
                                <input type="text" name="comment" placeholder="Saisir un commentaire" class="form-control" id="input_comment" style="border-radius: 0;">
                                <div class="rating">
                                    <input type="radio" id="star5" name="note" value="5" /><label for="star5" title="Meh">5 stars</label>
                                    <input type="radio" id="star4" name="note" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                    <input type="radio" id="star3" name="note" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                    <input type="radio" id="star2" name="note" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                    <input type="radio" id="star1" name="note" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                </div>
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
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/calendarReservation.js') }}"></script>
@endsection
