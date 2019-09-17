<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier</div>
                <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel-body">
                        <?php if($success = Session::get('success')): ?>
                            <div class="alert alert-info">
                                <?php echo e($success); ?>

                            </div>
                        <?php endif; ?>
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('admin.updateHouse', $house->id)); ?>" enctype="multipart/form-data">                      
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Titre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" maxlength="47" autofocus value="<?php echo e($house->title); ?>">
                                    <?php if($errors->has('title')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('title')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Categorie</label>
                                <div class="col-md-6">
                                    <select id="select_category" type="text" name="category_id" class="form-control">
                                        <option id="" value="<?php echo e($house->category->id); ?>" selected="selected" required autofocus><?php echo e($house->category->category); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group<?php echo e($errors->has('adresse') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Adresse</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="adresse" autofocus value="<?php echo e($house->adresse); ?>">
                                    <?php if($errors->has('adresse')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('adresse')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            

                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Prix</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="price" autofocus value="<?php echo e($house->price); ?>">
                                    <?php if($errors->has('price')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label">Photo</label>
                                
                                <div class="col-md-6">
                                    <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>">
                                </div>
                            </div>
                            
                            <div class="form-group<?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                                <label class="col-md-4"></label>
                                <div class="col-md-6">
                                <input id="name" type="file" class="form-control" name="photo" autofocus value="<?php echo e($house->photo); ?>">
                                <?php if($errors->has('photo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('photo')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" rows="5"><?php echo e($house->description); ?></textarea>
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="text-center">Informations supplémentaires:</label>
                            </div>
                            <?php $__currentLoopData = $house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatproprietes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group<?php echo e($errors->has('propriete[]') ? ' has-error' : ''); ?>">
                                    <label for="name" class="col-md-4 control-label"><?php echo e($valuecatproprietes->propriete->propriete); ?></label>
                                    <input type="hidden" id="propriete" class="form-control" name="propriete_id[]" autofocus value="<?php echo e($valuecatproprietes->propriete->id); ?>">
                                    
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="propriete[]" required autofocus value="<?php echo e($valuecatproprietes->value); ?>">
                                        <?php if($errors->has('propriete[]')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('propriete[]')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label" style="display:none;">Statut</label>
                                <div class="col-md-6">
                                    <select id="select_category" type="text" name="statut" class="form-control" style="display:none;">
                                        <option id="" value="<?php echo e($house->statut); ?>" selected="selected" required autofocus><?php echo e($house->statut); ?></option> 
                                        <option value="En attente de validation">En attente de validation</option>
                                        <option value="Validé">Validé</option>                       
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <p class="rouge">Pour les informations supplémentaires vous ne pouvez mettre que des chiffres. </p>
                                <p class="rouge">mettez 0 losque vous n'avez pas ou si vous ne savez pas encore, la propriété ne sera pas afficher dans l'annonce</p>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Statut</label>
                                <div class="col-md-6">
                                    <select id="select_category" type="text" name="statut" class="form-control">
                                        <option id="" value="<?php echo e($house->statut); ?>" selected="selected" required autofocus><?php echo e($house->statut); ?></option> 
                                        <option value="En attente de validation">En attente de validation</option>
                                        <option value="Validé">Validé</option>                       
                                    </select>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color">
                                    Enregistrer
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

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>