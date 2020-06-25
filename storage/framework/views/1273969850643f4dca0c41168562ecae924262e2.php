<?php $__env->startSection('title', 'Reservations annulées'); ?>
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
                    <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <tbody>
                            <tr>
                                <td style="width:250px"><img src="<?php echo e(asset('img/houses/'.$reservation->house->photo)); ?>" class="photo-size"/></td>
                                <td><?php echo e($reservation->house->title); ?></td>
                                <td><?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?></td>
                                <td><?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></td>
                                <td><?php echo e($reservation->user->prenom); ?> <?php echo e($reservation->user->nom); ?></td>
                                <td><a href="<?php echo e(action('AdminController@showreservationscancel', $reservation->id)); ?>" class="btn btn-primary btn-tableau">Voir</a><br/>
                            </tr>
                        </tbody>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>         
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>