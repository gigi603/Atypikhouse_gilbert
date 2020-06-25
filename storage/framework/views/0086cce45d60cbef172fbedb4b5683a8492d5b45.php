<?php $__env->startSection('title', 'Reservations passées'); ?>
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
            Liste des réservations passées
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Annonceur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $historiques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $historique): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <tbody>
                            <tr>
                                <td style="width:250px"><img src="<?php echo e(asset('img/houses/'.$historique->house->photo)); ?>" class="photo-size"/></td>
                                <td><?php echo e($historique->house->title); ?></td>
                                <td><?php \Date::setLocale('fr'); $startdate = Date::parse($historique->start_date)->format('l j F Y'); echo($startdate);?></td>
                                <td><?php \Date::setLocale('fr'); $enddate = Date::parse($historique->end_date)->format('l j F Y'); echo($enddate);?></td>
                                <td><?php echo e($historique->user->prenom); ?> <?php echo e($historique->user->nom); ?></td>
                                <td><a href="<?php echo e(action('AdminController@showhistoriques', $historique->id)); ?>" class="btn btn-primary btn-tableau">Voir</a><br/>
                            </tr>
                        </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>         
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>