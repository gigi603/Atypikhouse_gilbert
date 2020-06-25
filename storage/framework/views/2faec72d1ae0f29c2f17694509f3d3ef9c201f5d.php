<?php $__env->startSection('title', 'Nos Réservations'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid block-container block-size" role="reservations-annulees">
    <h1 class="h1-title">Mes réservations annulées</h1>
    <div class="row">
        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                <div class="card-houses h-100">       
                    <a href="<?php echo e(action('UsersController@showreservationsannulees', $reservation['id'])); ?>"><img class="img-houses-list" src="<?php echo e(asset('img/houses/'.$reservation->house->photo)); ?>" alt="Hébergement insolite - <?php echo e($reservation->house->title); ?>"></a>
                    <div class="card-block">
                        <div class="card-body">
                            <h2 class="card-title title-houses"><a href="<?php echo e(route('user.showreservationsannulees', $reservation['id'])); ?>"> <?php echo e($reservation->house->title); ?> </a></h2>
                        </div>
                        <p class="price">Total payé: <?php echo e($reservation->total); ?>€ <br> pour <?php echo e($reservation->nb_personnes); ?> personne(s)</p>
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
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text"><?php echo(substr($reservation->house->description, 0, 40));?></p>
                            <p>Statut: <span style="color:red;">Annulée</span></p>
                            <div class="text-center">
                                <a href="<?php echo e(route('user.showreservationsannulees', $reservation['id'])); ?>" class="btn btn-primary btn-color">Voir</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>