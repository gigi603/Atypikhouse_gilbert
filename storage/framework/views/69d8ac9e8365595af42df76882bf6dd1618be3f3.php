<?php $__env->startSection('title', 'Utilisateurs'); ?>
<?php $__env->startSection('content'); ?>
<!-- Icon Cards-->

<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Liste des utilisateurs</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nom / Prénom</th>
              <th>Compte activé</th>
              <th> Compte</th>
              <th>Profil</th>
              <th>Annonces</th>
              <th>Réservations</th>
              <th>Réservations passées</th>
              <th>Réservations annulées</th>
              <th>Notifications</th>
            </tr>
          </thead>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td><?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></td>
                    <td><?php echo e($user->statut); ?></td>
                    <?php if($user->statut ==  1): ?>
                        <td><a href="<?php echo e(route('admin.disable_user', $user->id)); ?>" class="delete-user btn btn-danger">Désactiver</a></td>
                    <?php else: ?>
                        <td><a href="<?php echo e(route('admin.activate_user', $user->id)); ?>" class="btn btn-success">Activer</a></td>
                    <?php endif; ?>
                    <td><a href="<?php echo e(action('AdminController@profilUser', $user['id'])); ?>" class="btn btn-primary">Profil</a></td>
                    <td><a href="<?php echo e(action('AdminController@listannonces', $user['id'])); ?>" class="btn btn-success">Annonces</a></td>
                    <td><a href="<?php echo e(action('AdminController@listreservations', $user['id'])); ?>" class="btn btn-info">Réservations</a></td>
                    <td><a href="<?php echo e(action('AdminController@listhistoriques', $user['id'])); ?>" class="btn btn-info">Réservations passées</a></td>
                    <td><a href="<?php echo e(action('AdminController@listreservationscancel', $user['id'])); ?>" class="btn btn-info">Réservations annulées</a></td>
                    <td><a href="<?php echo e(action('AdminController@messages', $user['id'])); ?>" class="btn btn-info">Notifications</a></td>
                </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>