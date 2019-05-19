<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                
                <div class="panel-body">
                    <p>Votre annonce a bien été prise en compte!</p>   
                    <p>Notre équipe va étudier votre annonce et revenir vers vous, nous vous enverrons un email</p>
                    <p>En attendantVous pouvez voir nos différents hebergements, cliquez ici</p>
                    <p>Notre équipe vous remercie!</p>                             
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>