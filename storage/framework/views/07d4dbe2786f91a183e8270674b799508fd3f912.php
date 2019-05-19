<?php $__env->startSection('title', 'Etape 2'); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>
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

                        <p>2. Décrivez nous votre bien</p>                     
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Titre de votre bien</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" maxlength="40" autofocus value="<?php echo e(old('title')); ?>">
                                    <?php if($errors->has('title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Categorie</label>
                                <div class="col-md-6">
                                    <select id="select_category" name="category_id" class="form-control">
                                        <option id="" value="0" autofocus>Choisissez votre categorie</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('category')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('category')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="proprietes"></div>
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" rows="5" placeholder="Ne pas saisir plus de 500 caractères"><?php echo e(old('description')); ?></textarea>
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
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
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/create_house.js')); ?>"></script>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>