<?php $__env->startSection('title', 'Nos hébergements'); ?>
<?php $__env->startSection('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de locations tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid" role="annonces">
    <h2 id="hebergements">Nos hébergements</h2>
    <div class="text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="input-group reservation-search">
                        <form class="form-horizontal" method="get" action="<?php echo e(url('search')); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 cadre">
                                    <h1 class="title title-intro">Trouvez les meilleurs locations atypique, partout en Europe !</h1>
                                    <div class="form-group reservation-search">
                                        <?php echo $__env->make('search',['url'=>'search','link'=>'search'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                </div>
                                <?php $__empty_1 = true; $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($house->statut == "Validé"): ?>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="card-houses h-100">       
                                                <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><img class="img-responsive" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>" alt="Hébergement insolite - <?php echo e($house->title); ?>"></a>
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <h3 class="card-title"><a href="<?php echo e(action('UsersController@showHouse', $house->id)); ?>"> <?php echo(substr($house->title, 0, 30));?> </a><br> <?php echo e($house->adresse); ?><br></h3> 
                                                    </div>
                                                    <p class="price"> <?php echo e($house->price); ?>€ / nuit</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <p style="color: #000;">Désolé aucun hébérgements ne correspond à vos critères</p>
                                        </div>
                                <?php endif; ?>
                            </div>
                        </form>
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
    <script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>