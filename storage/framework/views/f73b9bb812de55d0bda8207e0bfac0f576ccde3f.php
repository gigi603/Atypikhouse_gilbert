<?php $__env->startSection('title', 'Comfirmation création'); ?>
<?php $__env->startSection('content'); ?>
<div class="container margin-top">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Confirmation de la création de votre annonce</div>
                
                <div class="panel-body">
                    <p>Votre annonce a bien été prise en compte!</p>   
                    <p>Notre équipe va l'étudier et revenir vers vous.</p>
                    <p>Vous pouvez dès maintenant consulter votre annonce en appuyant sur le bouton ci-dessous</p>
                    <p>Notre équipe vous remercie!</p>
                    <div class="text-center">
                    <a href= "<?php echo e(url('/user/houses')); ?>" class="btn btn-success btn_reserve">Mes annonces</a>   
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>