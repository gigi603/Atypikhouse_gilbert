<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-offset-md-2 col-md-10">
                <div class="panel panel-default">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel-heading">Profil de <?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></div>
                    <div class="panel-body">       
                        <div class="row">                                      
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Nom : </label>
                                <div class="col-md-2">
                                    <?php echo e($user->nom); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Prénom : </label>
                                <div class="col-md-2">
                                    <?php echo e($user->prenom); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="name" class="col-md-2 control-label">Email : </label>
                                <div class="col-md-2">
                                    <?php echo e($user->email); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="<?php echo e(route('admin.listreservations', $user['id'])); ?>" class="btn btn-success button-profiluser">Ses réservations</a>
                            </div>
                            <div class="col-md-3">
                                <a href="<?php echo e(route('admin.listhistoriques', $user['id'])); ?>" class="btn btn-success button-profiluser">Ses historiques de reservations</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo e(route('admin.listannonces', $user['id'])); ?>" class="btn btn-success button-profiluser">Ses annonces</a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo e(route('admin.listcomments', $user['id'])); ?>" class="btn btn-success button-profiluser">Ses commentaires</a>
                            </div>
                            <div class="col-md-2">
                                    <a href="<?php echo e(route('admin.user_messages', $user['id'])); ?>" class="btn btn-success button-profiluser">Ses notifications</a>
                                </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>