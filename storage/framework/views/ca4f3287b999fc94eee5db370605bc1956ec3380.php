<?php $__env->startSection('title', 'Nos Historiques'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="container list-category margin-top" role="historiques">
    <h2 class="h2-title">Mes historiques</h2>
    <div class="row">
    <?php $__currentLoopData = $historiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-show h-100">
                    <a href="<?php echo e(action('UsersController@showhistoriques', $historique->id)); ?>"><img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>" alt="Hébergement insolite - <?php echo e($historique->house->title); ?>"></a>
                    <div>
                        <h3 class="title card-title text-center">
                            <a href="<?php echo e(route('user.showhistoriques', $historique->id)); ?>"><?php echo e($historique->house->title); ?></a>
                        </h3>
                        <p class="price">Total payé: <?php echo e($historique->total); ?>€ pour <?php echo e($historique->nb_personnes); ?> personne(s)</p>
                        <div class="card-infos">
                            <p>Type de bien : <?php echo e($historique->house->category->category); ?></p>
                            <?php $__currentLoopData = $historique->house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration > 0): ?>
                                <?php if($valuecatpropriete->value == 0): ?>
                                <?php else: ?>
                                    <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                <?php endif; ?>
                            <?php break; ?>   
                            <?php endif; ?>      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                            <p><?php echo(substr($historique->house->description, 0, 40));?></p>   
                            <p>Annulation gratuite !</p>
                            <p> Adresse: <?php echo e($historique->house->adresse); ?></p>
                        <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                        <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                        <p class="card-text"><?php echo(substr($historique->house->description, 0, 40));?></p>
                        <?php if($historique->house->statut == "En attente de validation"): ?>
                            <p>Statut: <span style="color:red;"><?php echo($historique->house->statut);?></span></p>
                        <?php else: ?>
                            <p>Statut: <span style="color:green;"><?php echo($historique->house->statut);?></span></p>
                        <?php endif; ?>
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