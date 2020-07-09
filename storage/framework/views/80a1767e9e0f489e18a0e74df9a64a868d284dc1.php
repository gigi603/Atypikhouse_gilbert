<?php $__env->startSection('footer', 'Etape 4'); ?>
<?php $__env->startSection('content'); ?>
<div class="container margin-top block-size">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                <?php echo Breadcrumbs::render('page4'); ?>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('house.postcreate_step4')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <p>4. Quel est le montant de votre bien ?</p>
                            
                        <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Prix la nuit</label>

                            <div class="col-md-6">
                                <input id="name" required type="text" class="form-control" name="price" value="<?php echo e($price); ?>">
                                <?php if($errors->has('price')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('price')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                                             
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-color">
                                Continuer
                            </button>
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOt3g2OEb6Br_DmsDwVgciAFiDdE5Qh0E&libraries=places"></script>
    <script src="<?php echo e(asset('js/autocomplete_address.js')); ?>"></script>
    <script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('js/proprietes.js')); ?>"></script>-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>