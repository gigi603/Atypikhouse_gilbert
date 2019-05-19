<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Créer un hébergement</div>
                <?php echo e(Breadcrumbs::render('/house/create')); ?>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('houses')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div id="step1">
                            <p>Où se situe votre bien?</p>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Ville</label>
                                <div class="col-md-6">
                                    <select id="name" type="text" name="ville_id" class="form-control">
                                        <option id="" value="defaut" selected="selected" required autofocus>Choisissez votre ville</option>
                                        <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo($ville->id);?>"><?php echo($ville->ville_nom);?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="step2">
                        <p>Décrivez nous votre bien</p>                     
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Categorie</label>
                                <div class="col-md-6">
                                    <select id="select_category" type="text" name="category_id" class="form-control">
                                        <option id="" value="defaut" selected="selected" required autofocus>Choisissez votre categorie</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo($category->id);?>"><?php echo($category->categorie);?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" required rows="5" placeholder="Ne pas saisir plus de 500 caractères"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="step3">
                        <p>Quel est le montant de votre bien ?</p>
                            <div id="propriete_category">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Titre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Prix</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="price" required autofocus>
                                </div>
                            </div>
                        </div>    
                        <div id="step4">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Photo</label>

                                <div class="col-md-6">
                                    <input id="name" type="file" class="form-control" name="photo" required autofocus>
                                </div>
                            </div>
                        </div>    

                            
                        
                        <!--<div class="col-md-6">
                            <input id="name" type="hidden" class="form-control" name="user_id" required autofocus value="<?php echo e(Auth::user()->id); ?>">
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>
                        </div>-->
                    </form>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" id="next">
                                Continuer
                            </button>
                            <button type="submit" class="btn btn-primary" id="next2">
                                Continuer
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/create_house.js')); ?>"></script>
<!--<script src="<?php echo e(asset('js/proprietes.js')); ?>"></script>-->


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>