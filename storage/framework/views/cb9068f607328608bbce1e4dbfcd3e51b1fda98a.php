<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">   
    <div class="container list-category">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de la réservation</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$reservation->house->photo)); ?>"></a>
                                <div class="card-body">
                                    <h4 class="title card-title text-center">
                                        <?php echo e($reservation->house->title); ?>

                                    </h4>
                                    <h3 class="price">Total payé: <?php echo e($reservation->total); ?>€ pour <?php echo e($reservation->nb_personnes); ?> personnes</h3>
                                    <p>Type de bien : <?php echo e($reservation->house->category->category); ?></p>
                                    <?php $__currentLoopData = $reservation->house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($valuecatpropriete->value == 0): ?>
                                        <?php else: ?>
                                            <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                        <?php endif; ?>                                 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                        <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                                    <p class="card-text"><?php echo e($reservation->house->description); ?></p>
                                    <p>Annulation gratuite !</p>
                                    <p> Adresse: <?php echo e($reservation->house->adresse); ?></p>
                                    <p>Téléphone de l'annonceur : <?php echo e($reservation->house->telephone); ?></p>
                                    <p>Adresse mail de l'annonceur : <?php echo e($reservation->user->email); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>