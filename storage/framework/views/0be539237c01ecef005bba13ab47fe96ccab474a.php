<?php $__env->startSection('content'); ?>
<div id="categories">
    <form class="form-horizontal" method="POST" action="<?php echo e(route('admin.register_category')); ?>" enctype="multipart/form-data">                      
        <?php echo e(csrf_field()); ?>

        <?php if($danger = Session::get('danger')): ?>
            <div class="alert alert-danger">
                <?php echo e($danger); ?>

            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Nom de la catégorie</label>
            <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="category" required autofocus value="">
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-primary" value="Ajouter"/>
            </div>
        </div>
    </form>               
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>