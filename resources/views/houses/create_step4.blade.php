@extends('layouts.app')
@section('footer', 'Etape 4')
@section('content')
<div class="container margin-top block-size">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page4') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step4')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <p>4. Quel est le montant de votre bien ?</p>
                            
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prix la nuit</label>

                            <div class="col-md-6">
                                <input id="name" required type="text" class="form-control" name="price" value="{{ $price }}">
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
@endsection
@section('footer', 'footer_absolute')
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBohiwddVUwXAr6a8oVcN59JBkyoB7bCU&libraries=places"></script>
    <script src="{{ asset('js/autocomplete_address.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
    <!--<script src="{{ asset('js/proprietes.js') }}"></script>-->
@endsection
{{-- @section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
@endsection --}}