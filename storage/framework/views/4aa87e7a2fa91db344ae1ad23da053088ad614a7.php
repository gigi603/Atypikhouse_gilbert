<?php $__env->startSection('title', 'Annonces'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card mb-3">
        <?php if(Session::has('success')): ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo e(Session::get('success')); ?>

            </div>
        <?php endif; ?>
        <div class="card-header">
            <i class="fas fa-table"></i>
            Liste des annonces
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th> Type d'annonce</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Annonceur</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <tbody>
                            <tr>
                                <td style="width:250px"><img src="<?php echo e(asset('img/houses/'.$house->photo)); ?>" class="photo-size"/></td>
                                <td><?php echo e($house->title); ?></td>
                                <td><?php echo e($house->category->category); ?>

                                <td><?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('l j F Y'); echo($startdate);?></td>
                                <td><?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('l j F Y'); echo($enddate);?></td>
                                <td><?php echo e($house->user["prenom"]); ?> <?php echo e($house->user["nom"]); ?></td>
                                <td><?php echo e($house->statut); ?></td>
                                <td><a href="<?php echo e(action('AdminController@showannonces', $house->id)); ?>" class="btn btn-primary btn-tableau">Voir</a><br/>
                                <a href="<?php echo e(action('AdminController@disableHouse', $house->id)); ?>" class="btn btn-danger delete-annonce">Supprimer</a></td>
                            </tr>
                        </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>         
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>