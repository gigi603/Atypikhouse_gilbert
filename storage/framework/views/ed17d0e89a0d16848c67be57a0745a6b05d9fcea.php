<?php $__env->startSection('title', 'Nos Hébergements'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid block-container block-size" role="annonces">
    <h1 class="h1-title">Mes hébergements</h1>
    <div class="row text-center" style="margin-bottom: 50px;">
        <a href="<?php echo e(route('house.create_step1')); ?>" class="btn btn-primary btn-color">Ajouter une annonce</a>
    </div>
    <div class="row">
        <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
                <ul>
                    <p><?php echo \Session::get('success'); ?></p>
                </ul>
            </div>
        <?php endif; ?>
        <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">         
                <div class="card-houses h-100">       
                    <a href="<?php echo e(action('UsersController@showhebergements', $house['id'])); ?>"><img class="img-houses-list" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>" alt="Hébergement insolite - <?php echo e($house->title); ?>"></a>
                    <div class="card-block">
                        <div class="card-body">
                            <h2 class="card-title title-houses"><a href="<?php echo e(route('user.showhebergements', $house['id'])); ?>"> <?php echo e($house->title); ?> </a></h2>
                        </div>
                        <p class="price"><?php echo e($house->price); ?>€ par nuit<br> pour <?php echo e($house->nb_personnes); ?> personne(s)</p>
                        <p>Type de bien : <?php echo e($house->category->category); ?></p>
                        <p class="title-houses"> Adresse: <?php echo e($house->adresse); ?></p>
                        <p><i class="fas fa-calendar"></i> Du: <?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('l j F Y'); echo($startdate);?> </p>
                        <p><i class="fas fa-calendar"></i> au:  <?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('l j F Y'); echo($enddate);?></p>
                        <?php if($house->statut == "En attente de validation"): ?>
                            <p>Statut: <span style="color:red;"><?php echo e($house->statut); ?></span></p>
                        <?php elseif($house->statut == "Refusé"): ?>
                            <p>Statut: <span style="color:red;"><?php echo e($house->statut); ?></span></p>
                        <?php else: ?>
                            <p>Statut: <span style="color:green;"><?php echo e($house->statut); ?></span></p>
                        <?php endif; ?>
                        <div class="text-center">
                            <a href="<?php echo e(route('user.showHouse', $house['id'])); ?>" class="btn btn-primary btn-color">Voir</a>
                            <a href="<?php echo e(route('user.editHouse', $house['id'])); ?>" class="btn btn-primary btn-color">Modifier</a>
                            <a href="<?php echo e(route('user.deleteHouse', $house['id'])); ?>" class="btn btn-danger delete-annonce">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>