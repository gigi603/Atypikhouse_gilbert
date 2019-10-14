<?php $__env->startSection('content'); ?>
<div id="categories">
    <h2>Catégories : </h2>
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
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href="<?php echo e(action('AdminController@proprietescategory', $category['id'])); ?>"><?php echo e($category->category); ?></a></td>
                    <td>
                        <a href="<?php echo e(action('AdminController@proprietescategory', $category['id'])); ?>" class="btn btn-warning"> propriétés</a>
                        <a href="<?php echo e(route('admin.enable_category', $category->id)); ?>" class="btn btn-success btn-color">Activer</a>
                        <a href="<?php echo e(route('admin.disable_category', $category->id)); ?>" class="delete btn btn-danger">Désactiver</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-10 text-center">
        <a href="<?php echo e(route('admin.create_category')); ?>" class="btn btn-primary">Ajouter une catégorie</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>