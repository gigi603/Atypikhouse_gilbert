@extends('layouts.app')
@section('title', 'Etape 5')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page5') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step5')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>5. Passons aux photos</p>
                        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control" name="photo" required autofocus>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color">
                                    Créer l'hebergement
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
    <script src="{{ asset('js/create_house.js') }}"></script>
@endsection
           