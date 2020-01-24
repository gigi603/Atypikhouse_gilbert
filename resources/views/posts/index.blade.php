<!--============================--> 
<!-- views/form/index.blade.php --> 
<!--============================--> 
@extends('layouts.app') 
@section('title', 'Contact')
@section('meta_description', "Si vous avez une question quelconque, veuillez nous contacter via notre formulaire de contact, notre équipe fera tout pour vous répondre dans les plus bref délais")
@section('footer', 'footer_absolute')
@section('content') 
    <div class="container" id="form"> 
        {!! Form::open(['url' => 'posts']) !!} 
        {{ csrf_field() }}
            <div class="form-group"> 
                {{-- @if (Form::is('success'))
                    <div class="alert alert-success">Votre formulaire a été envoyé.</div>
                @endif --}}
                @include('flash-message')
                @yield('content')
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Nom : ', array('class' => 'formLabel control-label')) !!} 
                    <input type="text" readonly name="name" class="form-control" value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}"/>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div> 
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                {!! Form::label('email', 'Email : ', array('class' => 'formLabel control-label')) !!} 
                <input type="email" readonly name="email" class="form-control" value="{{ Auth::user()->email }}"/>
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
                )) !!} 
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-check{{ $errors->has('agree') ? ' has-error' : '' }}">
                <input type="checkbox" class="form-check-input" name="agree" value="true" {{ !old('agree') ?: 'checked' }}>
                <label class="form-check-label" for="exampleCheck1">En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre professionnel</label>
                @if ($errors->has('agree'))
                    <span class="help-block">
                        <strong>{{ $errors->first('agree') }}</strong>
                    </span>
                @endif
            </div>
            {!! Form::submit('Envoyer !', array('class' => 'btn btn-success btn-color')) !!} 
        {!! Form::close() !!} 
    </div> 
@endsection 