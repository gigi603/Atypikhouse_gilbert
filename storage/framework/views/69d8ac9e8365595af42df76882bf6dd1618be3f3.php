<?php $__env->startSection('content'); ?>
<div id="utilisateur">
    <h2>Utilisateurs : </h2>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td><a href="<?php echo e(action('AdminController@profilUser', $user['id'])); ?>"><?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></a></td>
                    <td><?php echo e($user->email); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>