@extends('layouts.app')
@section('title', 'Faq')
@section('meta_description', "Nous vous mettons à disposition une faq ayant pour but de répondre à vos questions, si la faq ne répond pas à vos attentes, vous pouvez nous contacter via notre formulaire de contact")
@section('content')
    <div class="container margin-top block-size" role="faq de atypikhouse">
        <h1 class="h1-title">FAQ </h1>
        <div class="row">
            <div class="container">
                <div class="block">
                    <h2>Service client </h2>
                    <p>Notre équipe est à votre disposition pour toute question sur nos annonces, votre reservation et/ou votre annonce ou toute autre question d'ordre générale de 8h à 20h</p><br>
                    <h2>Mon paiement est-it sécurisé ?</h2>
                    <p>Avec le logiciel et API de Stripe qui est utilisé par un bon nombres d'entreprises tels que deliveroo, booking.com ou bien mano mano, nous garantissons un paiement sécurisée afin de combattre la fraude de paiement en ligne.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer', 'footer_absolute')
@section('script')
@endsection