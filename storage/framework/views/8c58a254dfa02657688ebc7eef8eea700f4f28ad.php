<?php $__env->startSection('content'); ?>
<div id="proprietes">
    <h2>Propriétés de <?php echo e($category->category); ?>: </h2>
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
    <?php $__currentLoopData = $proprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href=""><?php echo e($propriete->propriete); ?></a></td>
                    <td>
                        <a href="<?php echo e(route('admin.delete_propriete', $propriete->id)); ?>" class="delete-propriete btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-10 text-center">
        <a href="<?php echo e(action('AdminController@createpropriete', $category->id)); ?>" class="btn btn-primary">Ajouter une proprieté</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>