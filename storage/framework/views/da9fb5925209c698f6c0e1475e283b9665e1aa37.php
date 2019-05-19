<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                <?php echo Breadcrumbs::render('page3'); ?>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('house.postcreate_step3')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <p>3. Quel est le montant de votre bien ?</p>
                            
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Prix</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="price" required autofocus>
                            </div>
                        </div>
                                             
                        <div class="col-md-6 col-md-offset-4">
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Retour</a>
                            <button type="submit" class="btn btn-primary">
                                Continuer
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>         
</div> 
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/create_house.js')); ?>"></script>  
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>