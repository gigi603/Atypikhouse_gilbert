@extends('layouts.app') 
@section('title', 'Contact')
@section('meta_description', "Si vous avez une question quelconque, veuillez nous contacter via notre formulaire de contact, notre équipe fera tout pour vous répondre dans les plus bref délais")
@section('footer', 'footer_absolute')
@section('content')
    <div class="container margin-top block-size" role="mon profil">
        <h1 class="h1-title">Nous contacter</h1>
        <div class="row">
            <div class="container">
                <div class="block">
                    <div class="container" id="form">
                        <div class="col-sm-12 col-md-12">
                        {!! Form::open(['url' => 'sendMessage']) !!} 
                        {{ csrf_field() }}
                        <div class="form-group"> 
                            @include('flash-message')
                            @yield('content')
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Nom : ', array('class' => 'formLabel control-label')) !!} 
                                <input type="text" readonly required name="name" class="form-control" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}"/>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                            {!! Form::label('email', 'Email : ', array('class' => 'formLabel control-label')) !!} 
                            <input type="email" readonly required name="email" class="form-control" value="{{ Auth::user()->email }}"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}"> 
                            {!! Form::label('content', 'Message : ', array('class' => 'formLabel control-label')) !!} 
                            {!! Form::textarea('content', Form::old('content'), array( 
                                'class' => 'form-control', 
                                'placeholder' => 'Entrer votre message', 
                                'rows' => '8', 
                                'cols' => '15' ,
                                'required' => true
                            )) !!} 
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-check{{ $errors->has('agree') ? ' has-error' : '' }}">
                            <p class="form-check-label" for="exampleCheck1"><input type="checkbox" class="form-check-input" required name="agree" value="true" {{ !old('agree') ?: 'checked' }}> En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre professionnel</label>
                            @if ($errors->has('agree'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('agree') }}</strong>
                                </span>
                            @endif
                        </div>
                        {!! Form::submit('Envoyer', array('class' => 'btn btn-success btn-color')) !!} 
                        {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
