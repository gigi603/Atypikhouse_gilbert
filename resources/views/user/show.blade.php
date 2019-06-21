@extends('layouts.app')
@section('title', 'Détail de l"annonce')
@section('link')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
@section('content')
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading">Détails de l'annonce</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card h-100">
                        <img class="img-responsive img_house" src="{{ asset('img/houses/'.$house->photo) }}" alt="Hébergement insolite - {{$house->title}}"/>
                        <div class="card-show">
                            <h4 class="title card-title">
                                <a href="#">{{$house->title}}</a>
                            </h4>
                            <h3 class="price">{{$house->price}}€</h3>
                            <p>Type de bien : {{$house->category->category}}</p>
                            @foreach($house->valuecatproprietes as $valuecatpropriete)
                                @if($valuecatpropriete->value == 0)
                                @else
                                    <p>{{$valuecatpropriete->propriete->propriete}}: {{$valuecatpropriete->value}}</p> 
                                @endif                                 
                            @endforeach
                            <p>{{$house->description}}</p>
                            <p>Annulation gratuite !</p>
                            <p> Pays: {{$house->pays}}</p>
                            <p> Ville: {{$house->ville}}</p>
                            <p> Adresse: {{$house->adresse}}</p>
                            <p> Téléphone de l'annonceur : {{$house->telephone}}</p>
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
                                {!! Form::label('from', 'Départ : ', array('class' => 'formLabel')) !!}
                                {!! Form::text('start_date', Form::old('from'), array( 
                                    'class' => 'form-control',
                                    'id' => 'from',
                                )) !!} 
                                {!! Form::label('to', 'Arrivée : ', array('class' => 'formLabel')) !!} 
                                {!! Form::text('end_date', Form::old('to'), array( 
                                    'class' => 'form-control',
                                    'id' => 'to',
                                )) !!}
                                {!! Form::label('nb_personnes', 'nombre de personnes : ', array('class' => 'formLabel')) !!} 
                                <select id="" name="nb_personnes" class="form-control">
                                    <option id="" value="">Nombre de personnes</option>
                                    <option value="1" @if(old('nb_personnes') == "1") selected="selected" @endif>1</option>
                                    <option value="2" @if(old('nb_personnes') == "2") selected="selected" @endif>2</option>
                                    <option value="3" @if(old('nb_personnes') == "3") selected="selected" @endif>3</option>
                                    <option value="4" @if(old('nb_personnes') == "4") selected="selected" @endif>4</option>
                                    <option value="5" @if(old('nb_personnes') == "5") selected="selected" @endif>5</option>
                                    <option value="6" @if(old('nb_personnes') == "6") selected="selected" @endif>6</option>
                                    <option value="7" @if(old('nb_personnes') == "7") selected="selected" @endif>7</option>
                                    <option value="8" @if(old('nb_personnes') == "8") selected="selected" @endif>8</option>
                                    <option value="9" @if(old('nb_personnes') == "9") selected="selected" @endif>9</option>
                                    <option value="10" @if(old('nb_personnes') == "10") selected="selected" @endif>10</option>
                                    <option value="11" @if(old('nb_personnes') == "11") selected="selected" @endif>11</option>
                                    <option value="12" @if(old('nb_personnes') == "12") selected="selected" @endif>12</option>
                                    <option value="13" @if(old('nb_personnes') == "13") selected="selected" @endif>13</option>
                                    <option value="14" @if(old('nb_personnes') == "14") selected="selected" @endif>14</option>
                                    <option value="15" @if(old('nb_personnes') == "15") selected="selected" @endif>15</option>
                                    <option value="16" @if(old('nb_personnes') == "16") selected="selected" @endif>16</option>
                            </select>
                            </div>
                            <h3 class="price_reservation">Prix du séjour : {{$house->price}}€</h3>
                            @if (Auth::check())
                                {!! Form::submit('Réserver', array('class' => 'btn btn-success btn_reserve')) !!}
                                @if ($errors->any())
                                    <div class="alert alert-danger">Vous devez remplir tout les champs</div>
                                @endif
                            @else
                                <a href= "{{ route('login') }}" class="btn btn-success btn_reserve btn-color">Réserver</a>
                            @endif 
                        </form>   
                    </div>
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
                        @if (count($errors) > 0)
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
    <script src="{{ asset('js/calendar.js') }}"></script>
@endsection