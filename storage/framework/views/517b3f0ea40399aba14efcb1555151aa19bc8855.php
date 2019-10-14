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
                    <td>Compte activé : <?php echo e($user->statut); ?></td>
                    <?php if($user->statut ==  1): ?>
                        <td>
                            <a href="<?php echo e(route('admin.disable_user', $user->id)); ?>" class="delete-user btn btn-danger">Désactiver le compte</a>
                        </td>
                    <?php else: ?>
                        <td>
                            <a href="<?php echo e(route('admin.activate_user', $user->id)); ?>" class="btn btn-success">Activer le compte</a>
                        </td>
                    <?php endif; ?>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>