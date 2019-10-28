<?php $__env->startSection('title', 'Nos Hébergements'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
<div class="container annonces-block" role="annonces">
    <h2 class="text-center h2-title">Mes hébergements</h2>
    <div class="row text-center" style="margin-bottom: 50px;">
        <a href="<?php echo e(route('house.create_step1')); ?>" class="btn btn-primary btn-color">Ajouter une annonce</a>
    </div>
    <div class="row">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <p><?php echo \Session::get('success'); ?></p>
                </ul>
            </div>
        <?php endif; ?>
    <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-4">
            <div class="thumbnail">
                <div class="card-hebergement">
                    <a href="<?php echo e(action('UsersController@showhebergements', $house['id'])); ?>"><img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>"></a>
                    <h4 class="title card-title">
                        <a href="<?php echo e(route('user.showhebergements', $house['id'])); ?>"><?php echo e($house->title); ?></a>
                    </h4>
                    <p class="price"><?php echo e($house->price); ?>€ par nuit</p>
                
                    <p>Type de bien : <?php echo e($house->category->category); ?></p>     
                    <p><?php echo(substr($house->description, 0, 40));?></p>   
                    <p>Annulation gratuite !</p>
                    <p> Adresse: <?php echo e($house->adresse); ?></p>
                    <?php if($house->statut == "En attente de validation"): ?>
                        <p>Statut: <span style="color:red;"><?php echo($house->statut);?></span></p>
                    <?php else: ?>
                        <p>Statut: <span style="color:green;"><?php echo($house->statut);?></span></p>
                    <?php endif; ?>    
                    <div class="col-md-12 text-center">
                        <a href="<?php echo e(route('user.editHouse', $house['id'])); ?>" class="btn btn-primary btn-color">Modifier</a>
                        <a href="<?php echo e(route('user.deleteHouse', $house['id'])); ?>" class="btn btn-danger delete-annonce">Supprimer</a>
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