@extends('layouts.app')
@section('title', 'Etape 1')
@section('content')
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
                        <div class="form-group{{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Adresse</label>
                            <div class="col-md-6">
                            <input type="text" class="form-control" id="autocompleteadresse" name="adresse" placeholder="Saisir l'adresse" value={{$adresse}}>
                                @if ($errors->has('adresse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adresse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="hidden" class="form-control" name="user_id" required autofocus value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color" id="create_annonce_step1" >
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
@section('footer', 'footer_absolute')
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Via Plinio, 31, Rome, Metropolitan City of Rome, Italy -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBohiwddVUwXAr6a8oVcN59JBkyoB7bCU&libraries=places&language=fr"></script>
    <script src="{{ asset('js/autocomplete_address.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
    <!--<script src="{{ asset('js/proprietes.js') }}"></script>-->
@endsection
