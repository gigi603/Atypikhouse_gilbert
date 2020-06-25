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
                        <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Categorie</label>
                            <div class="col-md-6">
                                <select id="select_category" required name="category_id" class="form-control">
                                    <option id="" value="">Choisissez votre categorie</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($category->id > 1): ?>
                                            <option <?php echo e($categorySelected == $category->id ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('category_id')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category_id')); ?></strong>
                                    </span>
                                <?php endif; ?>
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
                        <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Date de début</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="from" placeholder="Date de début" name="start_date" value="<?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('d/m/Y'); echo($startdate);?>" />
                                
                                <?php if($errors->has('start_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('start_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Date de fin</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="to" placeholder="Date de fin" name="end_date" value="<?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('d/m/Y'); echo($enddate);?>" />
                                
                                <?php if($errors->has('end_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('end_date')); ?></strong>
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
                            <label for="name" class="col-md-4 control-label">Statut</label>
                            <div class="col-md-6">
                                <select id="select_category" type="text" name="statut" class="form-control">
                                    <option id="" value="<?php echo e($house->statut); ?>" selected="selected" required autofocus><?php echo e($house->statut); ?></option> 
                                    <option value="En attente de validation">En attente de validation</option>
                                    <option value="Validé">Validé</option>                       
                                </select>
                            </div>
                        </div>
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
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script>let site = "<?php echo e(env('APP_URL_SITE')); ?>"; </script>
    <script src="<?php echo e(asset('js/calendarCreateAnnonce.js')); ?>"></script>
    <script src="<?php echo e(asset('js/admin_create_house.js')); ?>"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBohiwddVUwXAr6a8oVcN59JBkyoB7bCU&libraries=places&language=fr"></script>
    <script src="<?php echo e(asset('js/autocomplete_address.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>