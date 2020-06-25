<?php $__env->startSection('title', "Messages des clients"); ?>
<?php $__env->startSection('content'); ?>
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
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Réservations</div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Réservations</th>
                    <th> Actions</th>
                </tr>
                </thead>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($post["unread"] == true): ?>
                        <tbody style="background-color:#dff0d8">
                            <tr>
                                <td><?php echo e($post->name); ?></td>
                                <td><a href="<?php echo e(route('admin.showmessages_reservation', $post->id)); ?>" class="btn btn-primary">Voir la notification</a></td>
                            </tr>
                        </tbody>
                    <?php else: ?>
                        <tbody>
                            <tr>
                                <td><?php echo e($post->name); ?></td>
                                <td><a href="<?php echo e(route('admin.showmessages_reservation', $post->id)); ?>" class="btn btn-primary">Voir la notification</a></td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>