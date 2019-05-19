@extends('layouts.app')
@section('title', 'Faq')
@section('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de loccation tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore')
@section('content')
<div class="container-fluid banner">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <form class="form-horizontal" method="get" action="{{url('search')}}" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 cadre">
                                        <h1 class="title title-intro">Trouvez les meilleurs locations atypique, <br />partout en Europe !</h1>
                                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-3 col-sm-9 col-sm-offset-1">
                                            <div class="form-group button2">
                                                @include('search',['url'=>'search','link'=>'search'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container list-category faq" role="faq">
    <h2>FAQ : </h2>
    <div class="row">
        <div class="container">
            <div id="faq">
                <h3>Mon paiement est-it sécurisée ?</h3>
                <p>Nous disposons d’un système de crytpage SSL pour protéger vos données personnelles ainsi que les moyens de paiement utilisés. Nous utilisons le système de paiement sécurisé de Stripe</p>
                <h3>SERVICE CLIENT 24/7</h3>
                <p>Notre équipe est à votre disposition pour toute question sur nos articles, votre commande ou autre question d'ordre générale</p>
                <h3>Mon paiement est-it sécurisée ?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id deserunt pariatur praesentium, dolor obcaecati quia qui iste nam? Est nesciunt blanditiis magni ab omnis architecto deserunt maiores, sapiente quaerat quibusdam.</p>
            </div>
        </div>
    </div>
</div>
@endsection