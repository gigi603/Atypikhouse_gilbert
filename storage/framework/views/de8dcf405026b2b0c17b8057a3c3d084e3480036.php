<?php $__env->startSection('title', 'Détail de l"annonde'); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-user-profil"> 
    <div class="container list-category" role="details-historique">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de l'annonce</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card-show h-100">
                                <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>" alt="Hébergement insolite - <?php echo e($historique->house->title); ?>"></a>
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        <a href="#"><?php echo e($historique->house->title); ?></a>
                                    </h4>
                                    <h3 class="price"><?php echo e($historique->house->price); ?>€</h3>
                                    <p>Type de bien : <?php echo e($historique->house->category->category); ?></p>
                                    <?php $__currentLoopData = $historique->house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($valuecatpropriete->value == 0): ?>
                                        <?php else: ?>
                                            <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                        <?php endif; ?>                                 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                    <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                                    <p class="card-text"><?php echo e($historique->house->description); ?></p>
                                    <p>Annulation gratuite !</p>
                                    <p> Pays: <?php echo e($historique->house->pays); ?></p>
                                    <p> Ville: <?php echo e($historique->house->ville); ?></p>
                                    <p> Adresse: <?php echo e($historique->house->adresse); ?></p>
                                    <p> Téléphone: <?php echo e($historique->house->telephone); ?></p>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>