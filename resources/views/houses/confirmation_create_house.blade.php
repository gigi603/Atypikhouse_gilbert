@extends('layouts.app')
@section('title', "Comfirmation création de l'annonce")
@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h1 style="font-size:30px;">Confirmation de la création de votre annonce</h1></div>
                
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
@section('footer', 'footer_absolute')
@section('script')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/create_house.js') }}"></script>
@endsection