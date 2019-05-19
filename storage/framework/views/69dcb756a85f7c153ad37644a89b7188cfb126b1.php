<?php $__env->startSection('title', 'Nos Hébergements'); ?>
<?php $__env->startSection('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de loccation tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore'); ?>

<?php $__env->startSection('content'); ?>
<div class="container list-category">
        <h2 id="hebergements">Nos hébergements</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-btn">
                        <form class="form-horizontal" method="get" action="<?php echo e(url('search')); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 30px;">
                                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-3 col-sm-9 col-sm-offset-1">
                                        <div class="form-group button2">
                                            <?php echo $__env->make('search',['url'=>'search','link'=>'search'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($house->statut == "Validé"): ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        
                    <div class="card h-100">
                            
                        <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><img class="img-responsive" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>"></a>
                        
                        <div class="card-block">
                            <div class="card-body">
                                <h3 class="card-title"><a href="<?php echo e(action('UsersController@showHouse', $house->id)); ?>"> <?php echo(substr($house->title, 0, 40));?>  </a></h3> 
                                <h3 class="card-title"> - <?php echo e($house->ville); ?> </h3>
                                
                            </div>
                            
                            <p class="price"> <?php echo e($house->price); ?>€ / nuit</p>
                        
                        
                    </div>
                    </div>
                </div>
            <?php endif; ?>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div> 
</div>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>