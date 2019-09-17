<?php $__env->startSection('content'); ?>
<div class="admin-user-profil"> 
<?php $__env->startSection('content'); ?>
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading">Messages envoyés à l'utilisateur</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                            <div class="panel-body">
                                <div class="col-sm-9">
                                    <?php echo e($message->content); ?>

                                </div>
                                <div class="col-sm-3 text-right">
                                    <?php if($message->user_id != "0"): ?>
                                        <small>Envoyé par <?php echo e($message->admin->name); ?></small><br/>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                        <div class="panel-body">
                            <form action="<?php echo e(route('admin.addMessage')); ?>" method="POST" style="display: flex;">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="admin_id" value="<?php echo e(Auth::user()->id); ?>">
                                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                <input type="text" name="content" placeholder="Saisir votre message" class="form-control" id="input_comment" style="border-radius: 0;">
                                <input type="submit" value="Envoyer" class="btn btn-primary btn-color" style="border-radius: 0;">
                            </form>
                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($error); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if(Session::has('success')): ?>
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <?php echo e(Session::get('success')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>