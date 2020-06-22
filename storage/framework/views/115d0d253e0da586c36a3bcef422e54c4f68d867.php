<?php $__env->startSection('title', "Connexion pour l'admin"); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Administrateurs, connectez-vous</div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <div class="form-label-group">
                        <input id="inputEmail" type="email" class="form-control" name="email" required="required" autofocus="autofocus">
                        <label for="inputEmail">Email</label>
                        <?php if(Session::has('errorAdminLogin')): ?>
                            <span class="help-block">
                                <span><?php echo e(Session::get('errorAdminLogin')); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <div class="form-label-group">
                        <input id="inputPassword" type="password" class="form-control" name="password" required>
                        <label for="inputPassword">Mot de passe</label>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                            <span><?php echo e($errors->first('password')); ?></span>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Connexion"/>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin-login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>