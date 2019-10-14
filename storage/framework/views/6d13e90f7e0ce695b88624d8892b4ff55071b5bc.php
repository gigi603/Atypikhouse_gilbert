<!--============================--> 
<!-- views/form/index.blade.php --> 
<!--============================--> 
 
<?php $__env->startSection('title', 'Contact'); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>
<?php $__env->startSection('content'); ?> 
    <div class="container" id="form"> 
        <?php echo Form::open(['url' => 'posts']); ?> 
            <div class="form-group"> 
                
                <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('name', 'Nom : ', array('class' => 'formLabel control-label')); ?> 
                    <?php echo Form::text('name', Form::old('name'), array( 
                        'class' => 'form-control', 
                        'placeholder' => 'Entrer votre nom',
                    )); ?> 
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div> 
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"> 
                <?php echo Form::label('email', 'Email : ', array('class' => 'formLabel control-label')); ?> 
                <?php echo Form::text('email', Form::old('email'), array( 
                    'class' => 'form-control', 
                    'placeholder' => 'Entrer votre email',
                )); ?> 
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div> 
            <div class="form-group<?php echo e($errors->has('content') ? ' has-error' : ''); ?>"> 
                <?php echo Form::label('content', 'Message : ', array('class' => 'formLabel control-label')); ?> 
                <?php echo Form::textarea('content', Form::old('content'), array( 
                    'class' => 'form-control', 
                    'placeholder' => 'Entrer votre message', 
                    'rows' => '8', 
                    'cols' => '15' ,
                )); ?> 
                <?php if($errors->has('content')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('content')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="form-check<?php echo e($errors->has('agree') ? ' has-error' : ''); ?>">
                <input type="checkbox" class="form-check-input" name="agree" value="true" <?php echo e(!old('agree') ?: 'checked'); ?>>
                <label class="form-check-label" for="exampleCheck1">En soumettant ce formulaire, j'accepte que les informations saisies soient exploitées dans le cadre professionnel</label>
                <?php if($errors->has('agree')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('agree')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <?php echo Form::submit('Envoyer !', array('class' => 'btn btn-success btn-color')); ?> 
        <?php echo Form::close(); ?> 
    </div> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>