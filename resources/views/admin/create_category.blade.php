@extends('layouts.admin')
@section('title', "Ajouter une catégorie d'annonce")
@section('content')
<div class="card mb-3">
    @if ($success = Session::get('success'))
    <div class="alert alert-success">
        {{ $success }}
    </div>
    @endif
    @if ($danger = Session::get('danger'))
        <div class="alert alert-danger">
            {{ $danger }}
        </div>
    @endif
    <div class="card-header">
        <i class="fas fa-table"></i>
        Ajouter une catégorie
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <form class="form-horizontal" method="POST" action="{{route('admin.register_category')}}" enctype="multipart/form-data">
                    <thead>
                        <tr>
                            {{ csrf_field() }}
                            <th>Nom de la catégorie</th>
                            <th>Créér</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <input id="name" type="text" class="form-control" name="category" required autofocus value="">
                        </tr>
                        <tr>
                            <input type="submit" class="btn btn-primary btn-color" value="Ajouter"/>
                        </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>
@endsection