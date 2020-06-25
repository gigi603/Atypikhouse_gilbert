<?php $__env->startSection('title', 'Profil'); ?>
<?php $__env->startSection('content'); ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user-circle"></i>
          Profil de <?php echo e($user->nom); ?> <?php echo e($user->prenom); ?>

    </div>
    <div class="card-body">    
        <div class="row">                                      
            <div class="col-md-12">
                <label for="name" class="control-label">Nom : <?php echo e($user->nom); ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="name" class="control-label">Prénom : <?php echo e($user->prenom); ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="name" class="control-label">Email : <?php echo e($user->email); ?></label>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>