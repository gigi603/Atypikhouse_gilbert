<?php $__env->startSection('title', 'Accueil'); ?>

<?php $__env->startSection('meta_description', 'Venez découvrir nos locations atypique, nous possèdons un vaste choix de loccation tels que des cabanes, des yourtes, des maisons sur piloti et bien dautres choses encore'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid banner">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <form class="form-horizontal" method="get" action="<?php echo e(url('search')); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h1 class="title title-intro">Trouvez les meilleurs locations atypique, <br />partout en Europe !</h1>
                                        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-3 col-sm-9 col-sm-offset-1">
                                            <div class="form-group button2">
                                                <?php echo $__env->make('search',['url'=>'search','link'=>'search'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                            <!--
                            <?php echo Form::open(['method'=>'GET','url'=>'QueryController@search','class'=>'form','role'=>'search']); ?>

                            <?php echo Form::text('search', null,
                                                array('required',
                                                        'class'=>'form-control ',
                                                        'placeholder'=>'Saisir une ville ...')); ?>

                            <?php echo Form::submit('Rechercher',
                                                        array('class'=>'btn btn-searchbar')); ?>

                            <?php echo Form::close(); ?>-->
<div id="block_home_2">
    <div id="tranquilite" class="block_home_2_child">
        <i class="fas fa-procedures fa-5x"></i>
        <h3>Tranquilité</h3>
        <p>Rester au calme pendant votre séjour dans nos habitats insolite. Nos cabanes et yourtes sauront combler vos désirs les plus variés</p>
    </div>
    <div id="depaysement" class="block_home_2_child">
        <i class="fab fa-angellist fa-5x"></i>
        <h3>Dépaysement</h3>
        <p>Sortez de la routine quotidienne et venez vivre des expérience unique dans des décors à couper le souffle</p>
    </div>
    <div id="money" class="block_home_2_child">
        <i class="far fa-money-bill-alt fa-5x"></i>
        <h3>Economie</h3>
        <p>Profitez de promotions toute l'année sur de nombreuses locations atypique tels que les cabanes, les cocons pour amoureux et bien d'autres. </p>
    </div>
</div>
<div class="container list-category">
    <h2>Nos hébergements</h2>
    <div class="row">
    <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($house->statut == "Validé"): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="card h-100">
                    <a href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>"><img class="img-responsive" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>"></a>
                    <div class="card-body">
                        <h3 class="title card-title">
                            <a href="<?php echo e(action('UsersController@showHouse', $house->id)); ?>"><?php echo e($house->title); ?></a>   
                        </h3>
                        
                        <p>Type de bien : <?php echo e($house->category->category); ?></p>
                        <?php $__currentLoopData = $house->proprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proprietes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($proprietes->propriete); ?>: 
                                <?php $__currentLoopData = $proprietes->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuepropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php echo e($valuepropriete->value); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>     
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <p class="price"><?php echo e($house->price); ?>€ par nuit</p>
                        <p>Annulation gratuite !</p>
                        <p class="card-text"><?php echo(substr($house->description, 0, 150));?></p>
                        <p> <?php echo e($house->ville); ?></p>
                    </div>
                    <div class="note card-footer">
                        <medium class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</medium>
                        <a class="btn btn-success btn_reserve" href="<?php echo e(action('UsersController@showHouse', $house['id'])); ?>">Réserver</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>