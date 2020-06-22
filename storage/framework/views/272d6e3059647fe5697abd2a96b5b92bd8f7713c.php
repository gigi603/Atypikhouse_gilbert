<?php $__env->startSection('title', 'Nos hébergements'); ?>
<?php $__env->startSection('meta_description', "Atypikhouse contient des espaces atypiques un peu partout en europe notamment en france à grenoble, seine et marne"); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid block-container" role="annonces">
    <h1 class="h1-title">Nos espaces atypiques</h1>
    <div class="text-center">
        <div class="container-fluid">
            <div class="row">
                
                    <div class="input-group reservation-search">
                        <form class="form-horizontal" method="get" action="<?php echo e(url('search')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            
                                <div class="col-lg-3 col-md-3 col-sm-12 cadre">
                                    <h2 class="h2-title">Atypikhouse offre les meilleurs espaces atypiques, partout en Europe !</h2>
                                    <div class="form-group reservation-search">
                                        <?php echo $__env->make('search',['url'=>'search','link'=>'search'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                </div> 
                                <?php $__empty_1 = true; $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($house->statut == "Validé"): ?>
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="card-houses h-100">       
                                                <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><img class="img-houses-list" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>" alt="Hébergement insolite - <?php echo e($house->title); ?>"></a>
                                                <div class="card-block">
                                                    <div class="card-body">
                                                        <h3 class="card-title title-houses"><a href="<?php echo e(action('UsersController@showHouse', $house->id)); ?>"> <?php echo e($house->title); ?> </a><br> <?php echo e($house->adresse); ?><br></h3> 
                                                    </div>
                                                    <p class="price"> <?php echo e($house->price); ?>€ / nuit</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <p style="color: #000;">Désolé aucunes annonces ne correspondent à vos critères</p>
                                            </div>
                                    <?php endif; ?>
                                </div>
                            
                        </form>
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