@extends('layouts.admin')
@section('content')
<div id="proprietes">
    <form class="form-horizontal" method="POST" action="{{route('admin.register_propriete')}}" enctype="multipart/form-data">                      
        {{ csrf_field() }}
        @if ($danger = Session::get('danger'))
            <div class="alert alert-danger">
                {{ $danger }}
            </div>
        @endif
        <div class="form-group {{ $errors->has('propriete') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Nom de la proprieté</label>
            <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="propriete" autofocus value="{{ old('propriete')}}">
                @if ($errors->has('propriete'))
                    <span class="help-block">
                        <strong>{{ $errors->first('propriete') }}</strong>
                    </span>
                @endif
                <input type="hidden" class="form-control" name="category_id" required autofocus value="{{$category->id}}">
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-color" value="Ajouter"/>
            </div>
        </div>
    </form>               
</div>
@endsection