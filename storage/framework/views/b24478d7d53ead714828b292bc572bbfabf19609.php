<?php $__env->startSection('content'); ?>
<div class="admin-user-profil">
    <div class="col-offset-md-2 col-md-10 right">
        
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="panel panel-default">
                <div class="panel-heading text-center">Annonces de <?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></div>
                <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 mb-4 thumbnail card-admin">
                                <div class="card h-100">
                                    <img class="img-responsive img_house" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>">
                                    <div>
                                        <h4 class="title card-title">
                                            <a href="<?php echo e(route('admin.showannonces', $house['id'])); ?>"><?php echo e($house->title); ?></a>
                                        </h4>
                                        <p class="price"><?php echo e($house->price); ?>€ par nuit</p>
                                        <div class="card-infos">
                                            <p>Type de bien : <?php echo e($house->category->category); ?></p>
                                            <?php $__currentLoopData = $house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($loop->iteration > 0): ?>
                                                <?php if($valuecatpropriete->value == 0): ?>
                                                <?php else: ?>
                                                    <p><?php echo e($valuecatpropriete->propriete->propriete); ?>: <?php echo e($valuecatpropriete->value); ?></p> 
                                                <?php endif; ?>
                                            <?php break; ?>   
                                            <?php endif; ?>      
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                                            <p><?php echo(substr($house->description, 0, 40));?></p>   
                                            <p>Annulation gratuite !</p>
                                            <p> <?php echo e($house->ville); ?></p>
                                            <p> <?php echo e($house->adresse); ?></p>
                                        <?php if($house->statut == "En attente de validation"): ?>
                                            <p>Statut: <span style="color:red;"><?php echo($house->statut);?></span></p>
                                        <?php else: ?>
                                            <p>Statut: <span style="color:green;"><?php echo($house->statut);?></span></p>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <a href="<?php echo e(route('admin.editHouse', $house['id'])); ?>" class="btn btn-primary">Modifier</a>
                                                    <a href="<?php echo e(route('admin.delete_annonce', $category->id)); ?>" class="delete btn btn-danger delete-annonce">Supprimer</a>
                                                        </div>
                                                    </form>
                                                    
                                                </div>                      
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>