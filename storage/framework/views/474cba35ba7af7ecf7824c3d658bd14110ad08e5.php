<?php $__env->startSection('title', 'Nos Hébergements'); ?>

<?php $__env->startSection('link'); ?>
<link href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="container list-category">
    <h2>Mes hébergements</h2>
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
                    <?php $__currentLoopData = $house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->iteration > 0): ?>
                            <?php if($valuecatpropriete->value == 0): ?>
                            <?php else: ?>
                                <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                            <?php endif; ?>
                        <?php break; ?>   
                        <?php endif; ?>      
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                    <p><?php echo(substr($house->description, 0, 40));?></p>   
                    <p>Annulation gratuite !</p>
                    <p> Pays: <?php echo e($house->pays); ?></p>
                    <p> Ville: <?php echo e($house->ville); ?></p>
                    <p> Adresse: <?php echo e($house->adresse); ?></p>
                    <?php if($house->statut == "En attente de validation"): ?>
                        <p>Statut: <span style="color:red;"><?php echo($house->statut);?></span></p>
                    <?php else: ?>
                        <p>Statut: <span style="color:green;"><?php echo($house->statut);?></span></p>
                    <?php endif; ?>    
                    <div class="col-md-12 text-center">
                        <a href="<?php echo e(route('user.editHouse', $house['id'])); ?>" class="btn btn-primary">Modifier</a>
                        <a href="<?php echo e(route('user.deleteHouse', $house['id'])); ?>" class="btn btn-danger delete-annonce">Supprimer</a>
                    </div>                                      
                </div>
            </div> 
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>