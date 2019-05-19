<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Message de <?php echo e($post->name); ?></div>
                    
                    <div class="panel-body card-message">
                        <p>Email: <?php echo e($post->email); ?></p>
<<<<<<< HEAD
                        <p><?php echo e($post->content); ?></p>   
                                                    
=======
                        <p><?php echo e($post->content); ?></p>                           
>>>>>>> a777e658a1cc052913a196146a7f0dbcbe325270
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>