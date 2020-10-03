@extends('layouts.app')
@section('title', 'Etape 2')
@section('content')
<div class="container margin-top block-size">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                {!! Breadcrumbs::render('page2') !!}
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('house.postcreate_step2')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <p>2. Numéro de téléphone à contacter pour l'annonce: (format de pays acceptés: france, belgique, italie, allemagne et l'espagne) </p>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Téléphone</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="phone" placeholder="Saisir un numéro de téléphone sans espaces" value="{{$telephone}}">
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="hidden" class="form-control" name="user_id" required autofocus value="{{ Auth::user()->id }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color" id="create_annonce_step2" >
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
    <script src="{{ asset('js/create_house.js') }}"></script>
    <!--<script src="{{ asset('js/proprietes.js') }}"></script>-->
@endsection
