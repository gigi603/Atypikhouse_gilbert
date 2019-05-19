<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <div class="container list-category">
        <h2>Mes réservations</h2>
        <div class="row">
        <?php $__currentLoopData = $historiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4">
                <div class="thumbnail">
                    <div class="card h-100">
                        <a href="<?php echo e(action('UsersController@showHouse', $historique->house['id'])); ?>"><img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>"></a>
                        <div>
                            <h4 class="title card-title text-center">
                                <a href="<?php echo e(route('user.showHouse', $historique->house['id'])); ?>"><?php echo e($historique->house->title); ?></a>
                            </h4>
                            <p class="price"><?php echo e($historique->house->price); ?>€ par nuit</p>
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
                                <p> <?php echo e($historique->house->ville); ?></p>
                            <p><i class="fas fa-calendar"></i> Début: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> Fin:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <h3 class="price"><?php echo e($historique->house->price); ?>€</h3>
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
</div>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>