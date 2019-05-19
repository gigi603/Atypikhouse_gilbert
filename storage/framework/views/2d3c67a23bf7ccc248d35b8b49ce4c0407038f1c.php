<!--============================--> 
<!-- views/form/index.blade.php --> 
<!--============================--> 
 
<?php $__env->startSection('content'); ?> 
    <div class="container" id="form"> 
        <?php echo Form::open(['url' => 'posts']); ?> 
            <div class="form-group"> 
                
                <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo Form::label('name', 'Nom : ', array('class' => 'formLabel')); ?> 
                <?php echo Form::text('name', Form::old('name'), array( 
                    'class' => 'form-control', 
                    'placeholder' => 'Entrer votre nom' 
                )); ?> 
            </div> 
            <div class="form-group"> 
                <?php echo Form::label('email', 'Email : ', array('class' => 'formLabel')); ?> 
                <?php echo Form::text('email', Form::old('email'), array( 
                    'class' => 'form-control', 
                    'placeholder' => 'Entrer votre email' 
                )); ?> 
            </div> 
            <div class="form-group"> 
                <?php echo Form::label('content', 'Message : ', array('class' => 'formLabel')); ?> 
                <?php echo Form::textarea('content', Form::old('content'), array( 
                    'class' => 'form-control', 
                    'placeholder' => 'Entrer votre message', 
                    'rows' => '8', 
                    'cols' => '15' 
                )); ?> 
            </div> 
            <?php echo Form::submit('Envoyer !', array('class' => 'btn btn-success')); ?> 
        <?php echo Form::close(); ?> 
    </div> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>