@extends('layouts.admin')
@section('content')
<div id="categories">
    <form class="form-horizontal" method="POST" action="{{route('admin.register_category')}}" enctype="multipart/form-data">                      
        {{ csrf_field() }}
        @if ($danger = Session::get('danger'))
            <div class="alert alert-danger">
                {{ $danger }}
            </div>
        @endif
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Nom de la catégorie</label>
            <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="category" required autofocus value="">
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary btn-color" value="Ajouter"/>
            </div>
        </div>
    </form>               
</div>
@endsection