@extends('layouts.admin')
@section('title', "Catégories d'annonces")
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
        <i class="fas fa-home"></i>
        Liste des catégories d'annonces
    </div>
    <div class="card-body">
        <div class="col-md-12 text-center">
            <a href="{{ route('admin.create_category') }}" class="btn btn-primary">Ajouter une catégorie</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Catégorie d'annonces</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach($categories as $category) 
                    <tbody>
                        <tr>
                            <td>{{$category->category}}</td>
                            <td>
                                <a href="{{action('AdminController@proprietescategory', $category['id'])}}" class="btn btn-warning"> propriétés</a>
                                <a href="{{ route('admin.enable_category', $category->id) }}" class="btn btn-success btn-color">Activer</a>
                                <a href="{{ route('admin.disable_category', $category->id) }}" class="delete btn btn-danger">Désactiver</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>    
@endsection