<?php $__env->startSection('title', 'Détails du message'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <?php if(Session::has('success-valide')): ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo e(Session::get('success-valide')); ?>

    </div>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo e(Session::get('error')); ?>

    </div>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Message</div>
                    
                    <div class="panel-body card-message">
                        <p>Nom / Prénom: <?php echo e($post->name); ?></p>
                        <p>Email: <?php echo e($post->email); ?></p>
                        <p><?php echo e($post->content); ?></p>                           
                    </div>
                </div>
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                    <div class="panel-body">
                        
                        <a href="<?php echo e(route('admin.showannonces', $house->id)); ?>">Voir l'annonce </a>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>