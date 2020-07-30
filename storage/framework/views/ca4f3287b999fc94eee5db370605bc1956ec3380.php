<?php $__env->startSection('title', 'Nos Historiques'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid block-container block-size" role="historiques">
    <h1 class="h1-title">Mes réservations passées</h1>
    <div class="row">
        <?php $__currentLoopData = $historiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                <div class="card-houses h-100">       
                    <a href="<?php echo e(action('UsersController@showhistoriques', $historique->id)); ?>"><img class="img-houses-list" src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>" alt="Hébergement insolite - <?php echo e($historique->house->title); ?>"></a>
                    <div class="card-block">
                        <div class="card-body">
                            <h2 class="card-title title-houses"><a href="<?php echo e(route('user.showhistoriques', $historique->id)); ?>"><?php echo e($historique->house->title); ?></a></h2>
                        </div>
                        <p class="price">Total payé: <?php echo e($historique->total); ?>€ <br> pour <?php echo e($historique->nb_personnes); ?> personne(s)</p>
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
                            <p>Annulation gratuite !</p>
                            <p class="title-houses"> Adresse: <?php echo e($historique->house->adresse); ?></p> 
                            <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?> </p>
                            <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <?php if($historique->reserved == 1): ?>
                                <p>Statut: <span style="color:green;">Réservé</span></p>
                            <?php else: ?>
                                <p>Statut: <span style="color:red;">Annulée</span></p>
                            <?php endif; ?>
                            <!--<div class="text-center"><a href="<?php echo e(route('user.showhistoriques', $historique['id'])); ?>" class="btn btn-primary btn-color">Voir</a></div>-->
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