<?php $__env->startSection('title', 'Mes notifications'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid" role="notifications">
    <h1 class="h1-title">Mes notifications</h1>
    <div class="panel panel-default notifications-panel">
        <div class="panel-heading">Liste de mes notifications</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                            <div class="panel-body">
                                <div class="col-sm-9">
                                    <?php echo e($message->content); ?>

                                </div>
                                <div class="col-sm-3 text-right">
                                    <?php if($message->user_id != "0"): ?>
                                        <small>Envoyé par un administrateur</small><br/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>