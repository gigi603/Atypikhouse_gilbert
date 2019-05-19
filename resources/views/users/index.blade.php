@extends('layouts.app')
@section('title', 'Utilisateur')
@section('footer', 'footer_absolute')
@section('content')

<div class="container container-profile">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                        {{Auth::user()->prenom}} {{Auth::user()->nom}}</h4>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{Auth::user()->email}}
                        </p>
                        <br>
                        <div class="btn-group">
                        {{-- <a href="{{action('UsersController@edit', Auth::user()->id)}}" class="btn btn-warning btn_modif_and_delete">Modifier</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    console.log("<?php echo(Auth::user()->id)?>");
});
</script>
@endsection