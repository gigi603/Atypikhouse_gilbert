<?php $__env->startSection('title', 'Nos Réservations'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="container list-category margin-top" role="reservations">
    <h2 class="h2-title">Mes réservations</h2>
    <div class="row">
    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-show h-100">
                    <a href="<?php echo e(action('UsersController@showreservations', $reservation['id'])); ?>"><img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$reservation->house->photo)); ?>" alt="Hébergement insolite - <?php echo e($reservation->house->title); ?>"></a>
                    <div>
                        <h4 class="title card-title text-center">
                            <a href="<?php echo e(route('user.showreservations', $reservation['id'])); ?>"><?php echo e($reservation->house->title); ?></a>
                        </h4>
                        <p class="price"><?php echo e($reservation->house->price); ?>€ par nuit</p>
                        <div class="card-infos">
                            <p>Type de bien : <?php echo e($reservation->house->category->category); ?></p>
                            <?php $__currentLoopData = $reservation->house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration > 0): ?>
                                <?php if($valuecatpropriete->value == 0): ?>
                                <?php else: ?>
                                    <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                <?php endif; ?>
                            <?php break; ?>   
                            <?php endif; ?>      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                            <p><?php echo(substr($reservation->house->description, 0, 40));?></p>   
                            <p>Annulation gratuite !</p>
                            <p> Adresse: <?php echo e($reservation->house->adresse); ?></p>
                        <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                        <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                        <h3 class="price"><?php echo e($reservation->house->price); ?>€</h3>
                        <p class="card-text"><?php echo(substr($reservation->house->description, 0, 40));?></p>
                        <?php if($reservation->house->statut == "En attente de validation"): ?>
                            <p>Statut: <span style="color:red;"><?php echo($reservation->house->statut);?></span></p>
                        <?php else: ?>
                            <p>Statut: <span style="color:green;"><?php echo($reservation->house->statut);?></span></p>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>