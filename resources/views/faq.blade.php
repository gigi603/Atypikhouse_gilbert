@extends('layouts.app')
@section('title', 'Faq')
@section('meta_description', "Nous vous mettons à disposition une faq ayant pour but de répondre à vos questions, si la faq ne répond pas à vos attentes, vous pouvez nous contacter via notre formulaire de contact")
@section('footer', 'footer_absolute')

@section('content')
<div class="container list-category faq" role="faq">
    <h1 id="faq">FAQ : </h1>
    <div class="row">
        <div class="container">
            <div id="faq">
                <h2>Mon paiement est-it sécurisée ?</h2>
                <p>Nous disposons d’un système de crytpage SSL pour protéger vos données personnelles ainsi que les moyens de paiement utilisés. Nous utilisons le système de paiement sécurisé de Stripe</p>
                <h2>SERVICE CLIENT 24/7</h2>
                <p>Notre équipe est à votre disposition pour toute question sur nos articles, votre commande ou autre question d'ordre générale</p>
                <h2>Mon paiement est-it sécurisée ?</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id deserunt pariatur praesentium, dolor obcaecati quia qui iste nam? Est nesciunt blanditiis magni ab omnis architecto deserunt maiores, sapiente quaerat quibusdam.</p>
            </div>
        </div>
    </div>
</div>
@endsection