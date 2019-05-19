<?php $__env->startSection('content'); ?>
<div id="utilisateur">
<a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">Retour</a>
    <h2>Commentaires : </h2>
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
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><?php echo e($comment->comment); ?> </td>
                    <td>Note: <?php echo e($comment->note); ?>/5</td>
                    <td><?php echo e($comment->house->title); ?>

                    <td>
                        <h3 class="price"><?php echo e($comment->house->price); ?>€</h3>
                    </td>
                    <td>
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="<?php echo e(route('admin.deleteComment', $comment->id)); ?>" class="delete-comment btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>