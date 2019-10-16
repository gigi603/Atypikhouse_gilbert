<?php $__env->startSection('title', 'Recapitulatif réservation'); ?>
<?php $__env->startSection('link'); ?>
<?php $__env->startSection('content'); ?>
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Récapitulatif de votre réservation</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                            <p class="card-text">Vous êtes sur le point de réserver pour le <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> au <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text"> à l'adresse: <?php echo e($house->adresse); ?></p>
                            <p class="card-text">Voici le récapitulatif de l'hebergement que vous avez choisi : </p>
                            <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>"></a>
                            <div class="card-show">
                                <h4 class="title card-title">
                                    <a href="#"><?php echo e($house->title); ?></a>
                                </h4>
                                <p>Type de bien : <?php echo e($house->category->category); ?></p>
                                <?php $__currentLoopData = $house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                  
                                    <p><?php echo e($valuecatpropriete->propriete->propriete); ?></p>                     
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p class="card-"><?php echo e($house->description); ?></p>
                                <p>Annulation gratuite !</p>
                                <p> <?php echo e($house->ville); ?></p>
                                <h3 class="price">Prix: <?php echo e($house->price); ?> € x <?php echo e($days); ?> jours pour <?php echo e($reservation->nb_personnes); ?> personne(s)</h3>
                                <h3 class="price">Total à payer : <?php echo e($total); ?> €</h3>
                                <p> Si vous voulez réserver cet hébergement veuillez continuer en cliquant sur le bouton ci-dessous</p>
                                <a class="btn btn-success btn_reserve" href="<?php echo e(action('AddMoneyController@payWithStripe', 
                                    ['prix' => $house->price,
                                    'start' => $reservation->start_date,
                                    'end' => $reservation->end_date,
                                    'nb_personnes' => $reservation->nb_personnes,
                                    'days' => $days,
                                    'total' => $total,
                                    'user_id' => $reservation->user_id,
                                    'house_id' => $reservation->house_id
                                    ])); ?>">Aller au paiement</a>
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>