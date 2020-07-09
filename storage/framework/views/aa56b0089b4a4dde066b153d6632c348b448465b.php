<?php $__env->startSection('title', "Détails de la réservation passée"); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <?php if(Session::has('success-valide')): ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo e(Session::get('success-valide')); ?>

    </div>
    <?php endif; ?>
    <div class="container list-category">
        <div class="panel panel-default">
            <div class="panel-heading">Détails de la réservation passée</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="text-center">
                                <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>">
                                <div class="card-center">
                                    <h4 class="title card-title text-center">
                                        <?php echo e($historique->house->title); ?>

                                    </h4>
                                    <div class="block-description">
                                        <h3 class="price">Total payé: <?php echo e($historique->total); ?>€ pour <?php echo e($historique->nb_personnes); ?> personnes</h3>
                                        <p>Type de bien : <?php echo e($historique->house->category->category); ?></p>
                                        <?php $__currentLoopData = $historique->house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($valuecatpropriete->value == 0): ?>
                                            <?php else: ?>
                                                <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                            <?php endif; ?>                                 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                                        <p class="card-text"><?php echo e($historique->house->description); ?></p>
                                        <p> Adresse: <?php echo e($historique->house->adresse); ?></p>
                                        <p>Téléphone de l'annonceur : <?php echo e($historique->house->phone); ?></p>
                                        <p>Adresse mail de l'annonceur : <?php echo e($historique->user->email); ?></p>
                                    </div>
                                </div>
                            </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>