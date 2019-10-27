<?php $__env->startSection('title', 'Etape 2'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                <?php echo Breadcrumbs::render('page2'); ?>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('house.postcreate_step2')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <p>2. Numéro de téléphone à contacter pour l'annonce</p>
                        <div class="form-group<?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Téléphone</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telephone" placeholder="Saisir un numéro de téléphone sans espaces" autofocus value="<?php echo e(last($houseTelephone)); ?>">
                                <?php if($errors->has('telephone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telephone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input id="name" type="hidden" class="form-control" name="user_id" required autofocus value="<?php echo e(Auth::user()->id); ?>">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color" id="create_annonce_step2" >
                                    Continuer
                                </button>
                            </div>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('js/proprietes.js')); ?>"></script>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>