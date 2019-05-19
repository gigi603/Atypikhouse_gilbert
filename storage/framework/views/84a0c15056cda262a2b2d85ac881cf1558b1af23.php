<?php $__env->startSection('content'); ?>

<div class="container container-profile">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                        <?php echo e(Auth::user()->prenom); ?> <?php echo e(Auth::user()->nom); ?></h4>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo e(Auth::user()->email); ?>

                        </p>
                        <br>
                        <div class="btn-group">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    console.log("<?php echo(Auth::user()->id)?>");
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>