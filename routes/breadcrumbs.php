<?php

// Accueil
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

//Où est situé votre bien



Breadcrumbs::register('page1', function($breadcrumbs) {
    $breadcrumbs->push('1. Où est situé votre bien ?', route('house.create_step1'));
});

Breadcrumbs::register('page2', function($breadcrumbs) {
    $breadcrumbs->push('1. Où est situé votre bien ?', route('house.create_step1'));
    $breadcrumbs->push("2. Numéro de téléphone à contacter pour l'annonce", route('house.create_step2'));
});

Breadcrumbs::register('page3', function($breadcrumbs) {
    $breadcrumbs->push('1. Où est situé votre bien ?', route('house.create_step1'));
    $breadcrumbs->push("2. Numéro de téléphone à contacter pour l'annonce", route('house.create_step2'));
    $breadcrumbs->push('3. Décrivez-nous votre bien', route('house.create_step3'));
});

Breadcrumbs::register('page4', function($breadcrumbs) {
    $breadcrumbs->push('1. Où est situé votre bien ?', route('house.create_step1'));
    $breadcrumbs->push("2. Numéro de téléphone à contacter pour l'annonce", route('house.create_step2'));
    $breadcrumbs->push('3. Décrivez-nous votre bien', route('house.create_step3'));
    $breadcrumbs->push('4. Quel est le montant de votre bien ?', route('house.create_step4'));
});

Breadcrumbs::register('page5', function($breadcrumbs) {
    $breadcrumbs->push('1. Où est situé votre bien ?', route('house.create_step1'));
    $breadcrumbs->push("2. Numéro de téléphone à contacter pour l'annonce", route('house.create_step2'));
    $breadcrumbs->push('3. Décrivez-nous votre bien', route('house.create_step3'));
    $breadcrumbs->push('4. Quel est le montant de votre bien ?', route('house.create_step4'));
    $breadcrumbs->push('5. Passons aux photos', route('house.create_step5'));
});