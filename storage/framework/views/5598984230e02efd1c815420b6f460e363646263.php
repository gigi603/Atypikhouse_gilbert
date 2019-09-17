<?php $__env->startSection('title', 'Mes notifications'); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('css/jquery-ui.min.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<div class="container list-category" role="notifications">
    <div class="panel panel-default">
        <div class="panel-heading">Mes notifications</div>
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
                                        <small>Envoyé par <?php echo e($message->admin->name); ?></small><br/>
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