<?php $__env->startSection('title', "Catégories d'annonces"); ?>
<?php $__env->startSection('content'); ?>
<div class="card mb-3">
    <?php if($success = Session::get('success')): ?>
    <div class="alert alert-success">
        <?php echo e($success); ?>

    </div>
    <?php endif; ?>
    <?php if($danger = Session::get('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e($danger); ?>

        </div>
    <?php endif; ?>
    <div class="card-header">
        <i class="fas fa-home"></i>
        Liste des catégories d'annonces
    </div>
    <div class="card-body">
        <div class="col-md-12 text-center">
            <form class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?>" method="POST" action="<?php echo e(route('admin.register_category')); ?>" enctype="multipart/form-data">
                <input id="name" type="text" class="form-control" name="category" autofocus value="<?php echo e(old('category')); ?>">
                <?php if($errors->has('category')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('category')); ?></strong>
                    </span>
                <?php endif; ?>
                <button class="btn btn-primary btn-add-category">Ajouter une catégorie</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Catégorie d'annonces</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <tbody>
                        <tr>
                            <td><?php echo e($category->category); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.proprietes_category', $category->id)); ?>" class="btn btn-warning"> propriétés</a>
                                <a href="<?php echo e(route('admin.enable_category', $category->id)); ?>" class="btn btn-success btn-color">Activer</a>
                                <a href="<?php echo e(route('admin.disable_category', $category->id)); ?>" class="delete btn btn-danger">Désactiver</a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>