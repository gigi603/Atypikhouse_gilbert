<?php $__env->startSection('content'); ?>
<div class="container list-category">
    <h2>Nos hébergements</h2>
    <div class="row">
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div class="card h-100">
                <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><img class="img-responsive" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>"></a>
                <div class="card-body">
                    <h3 class="title card-title">
                        <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><?php echo e($house->title); ?></a>
                    </h3>
                    <p>Type de bien : Logement</p>
                    <p><i class="fas fa-bed"></i> : 2 lits - <i class="fas fa-users"></i> : pour 2 Personnes</p>
                    <h3 class="price"><?php echo e($house->price); ?>€</h3>
                    <p class="card-text"><?php echo(substr($house->description, 0, 40));?></p>
                    <p><?php echo e($house->ville); ?></p>
                </div>
                <div class="note card-footer">
                    <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</medium>
                    <a class="btn btn-success btn_reserve" href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>">Réserver</a>
                </div>
            </div>
        </div>   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>   
</div>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>