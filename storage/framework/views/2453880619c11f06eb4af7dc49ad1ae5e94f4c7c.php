<?php $__env->startSection('title', 'Utilisateur'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Modifier</div>
                
                <div class="panel-body">
                    <?php if($success = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e($success); ?>

                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('user.updateHouse', $house->id)); ?>" enctype="multipart/form-data">                      
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
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo($category->id);?>" <?php if($house->category->id  == $category->id): ?> selected="selected" <?php endif; ?>><?php echo($category->category);?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="proprietes"></div>
                        <div class="form-group<?php echo e($errors->has('nb_personnes') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nombre de personnes</label>
                            <div class="col-md-6">
                                <select id="select_nb_personnes" name="nb_personnes" class="form-control">
                                    <option id="" value="<?php echo e($house->nb_personnes); ?>" selected="selected" required autofocus><?php echo e($house->nb_personnes); ?></option>
                                    <?php for($i=1;$i<16;$i++): ?>
                                    <option value=<?php echo e($i); ?> <?php if(old('nb_personnes') == $i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?> 
                                </select>
                                <?php if($errors->has('nb_personnes')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nb_personnes')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('adresse') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Adresse</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="autocompleteadresse" name="adresse" autofocus value="<?php echo e($house->adresse); ?>">
                                <?php if($errors->has('adresse')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('adresse')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <input id="house_id" value="<?php echo e($house->id); ?>" hidden>

                        <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Prix / la nuit</label>
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
                            <div class="col-md-12 text-center">
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
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBohiwddVUwXAr6a8oVcN59JBkyoB7bCU&libraries=places&language=fr"></script>
    <script src="<?php echo e(asset('js/autocomplete_address.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>