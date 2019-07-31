@extends('layouts.app')
@section('title', 'Comfirmation création')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Confirmation de la création de votre annonce</div>
                
                <div class="panel-body">
                    <p>Votre annonce a bien été prise en compte!</p>   
                    <p>Notre équipe va l'étudier et revenir vers vous.</p>
                    <p>Vous pouvez dès maintenant consulter votre annonce en appuyant sur le bouton ci-dessous</p>
                    <p>Notre équipe vous remercie!</p>
                    <div class="text-center">
                    <a href= "{{ url('/user/houses') }}" class="btn btn-success btn_reserve">Mes annonces</a>   
                    </div>                    
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