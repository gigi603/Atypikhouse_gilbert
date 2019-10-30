@extends('layouts.app')
@section('title', 'Ma location')
@section('footer', 'footer_absolute')
@section('content')
<div class="container list-category">
    <h2>Mes hébergements</h2>
    <div class="row">
        @foreach($houseProfil as $house)
        
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 thumbnail">
                <a href="#"><img class="card-img-top" src="{{ asset('img/houses/'.$house->photo) }}"></a></a>
                <div class="card-body">
                    <h3 class="title card-title">
                        <p>{{$house->title}}</p>
                    </h3>
                    <h3 class="pruice">{{$house->price}}€</h3>
                </div>
                <div class="note card-footer">
                    <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</medium>
                </div>
            </div>
            <a href="{{action('HousesController@edit', $house->id)}}" class="btn btn-warning btn_modif_and_delete">Modifier</a>
            <form action="{{action('HousesController@destroy', $house->id)}}" method="post" class="btn_modif_and_delete">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        @endforeach
        
    </div>   
</div>