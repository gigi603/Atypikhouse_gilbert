<?php $__env->startSection('title', 'Détail de l"annonce'); ?>
<?php $__env->startSection('link'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="h1-title">Détails de l'annonce</h1>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h2><?php echo e($house->title); ?></h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card h-100">
                        <img class="img-house-detail" src="<?php echo e(asset('img/houses/'.$house->photo)); ?>" alt="Hébergement insolite - <?php echo e($house->title); ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="calendar panel panel-default">
                        <h3 class="text-center panel-heading">Réserver vos dates : </h3>
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('reservations')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input type="hidden" name="house_id" value="<?php echo e($house->id); ?>">
                                <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('from', 'Départ : ', array('class' => 'formLabel control-label')); ?>

                                    <?php echo Form::text('start_date', Form::old('from'), array( 
                                        'class' => 'form-control',
                                        'required' => true,
                                        'id' => 'from',
                                    )); ?>

                                    <?php if($errors->has('start_date')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('start_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('to', 'Arrivée : ', array('class' => 'formLabel control-label')); ?> 
                                    <?php echo Form::text('end_date', Form::old('to'), array( 
                                        'class' => 'form-control',
                                        'required' => true,
                                        'id' => 'to',
                                    )); ?>

                                    <?php if($errors->has('end_date')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('end_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                 
                                <input type="hidden" name="start_date_annonce" id="start_date_annonce" value="<?php echo e($house->start_date); ?>"/>
                                <input type="hidden" name="end_date_annonce" id="end_date_annonce" value="<?php echo e($house->end_date); ?>"/>
                                <div class="form-group<?php echo e($errors->has('nb_personnes') ? ' has-error' : ''); ?>">
                                    <select id="select_nb_personnes" name="nb_personnes" required class="form-control">
                                        <option id="" value="" autofocus>Nombre de personnes</option>
                                        <?php for($i=1;$i<= $house->nb_personnes;$i++): ?>
                                        <option value=<?php echo e($i); ?> <?php if(old('nb_personnes') == $i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?> 
                                    </select>
                                    <?php if($errors->has('nb_personnes')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('nb_personnes')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    
                                </div>
                                <input type="hidden" name="house_id" value="<?php echo e($house->id); ?>"/>

                                </div>
                                <?php if(Auth::check()): ?>
                                    <?php echo Form::submit('Réserver', array('class' => 'btn btn-success btn_reserve')); ?>

                                <?php else: ?>
                                    <a href= "<?php echo e(route('login')); ?>" class="btn btn-success btn_reserve btn-color">Réserver</a>
                                <?php endif; ?> 
                            </form>   
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card-show">
                            <h3 class="title card-title text-center"><?php echo e($house->title); ?></h3>
                            <h4 class="price"><?php echo e($house->price); ?>€ / la nuit</h4>
                            <p>Type de bien : <?php echo e($house->category->category); ?></p>
                            <p>Disponible du <?php \Date::setLocale('fr'); $startdate = Date::parse($house->start_date)->format('l j F Y'); echo($startdate);?> au
                            <?php \Date::setLocale('fr'); $enddate = Date::parse($house->end_date)->format('l j F Y'); echo($enddate);?> </p>
                            <p>Pour <?php echo e($house->nb_personnes); ?> personne(s) maximum</p>
                            <?php $__currentLoopData = $house->valuecatproprietes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuecatpropriete): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(@count($valuecatpropriete) != 0): ?>
                                    <p><?php echo e($valuecatpropriete->propriete->propriete); ?></p>
                   		 <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-md-12 space-top">
                        <p><?php echo e($house->description); ?></p>
                        <p>Annulation gratuite !</p>
                        <p> Adresse: <?php echo e($house->adresse); ?></p>
                        <p> Téléphone de l'annonceur : <?php echo e($house->telephone); ?></p>
                        <p> Adresse mail de l'annonceur : <?php echo e($house->user->email); ?></p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php $__currentLoopData = $house->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                            <div class="panel-body">
                                <div class="col-sm-9">
                                    <?php echo e($comment->comment); ?>

                                </div>
                                <div class="col-sm-3 text-right">
                                    <?php if($comment->user_id != "0"): ?>
                                        <small>Posté par <?php echo e($comment->user->prenom); ?> <?php echo e($comment->user->nom); ?></small><br/>
                                        <?php if($comment->note != "0"): ?>
                                            <small>Note: <?php echo e($comment->note); ?>/5</small>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <small>Posté par <?php echo e($comment->admin->name); ?></small><br/>
                                        <?php if($comment->note != "0"): ?>
                                            <small>Note: <?php echo e($comment->note); ?>/5</small> 
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php if(Auth::check()): ?>
                        <?php if($client_reserved->count() > 0 OR $house->user_id == Auth::user()->id): ?>
                            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                                <div class="panel-body">
                                    <form action="<?php echo e(url('/comments')); ?>" method="POST" style="display: flex;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="house_id" value="<?php echo e($house->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                        <input type="hidden" name="admin_id" value="0"> 
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <input type="text" name="comment" placeholder="Saisir un commentaire" class="form-control" id="input_comment" style="border-radius: 0;">
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 rating">
                                            <input type="radio" id="star5" name="note" value="5" /><label for="star5" title="Meh">5 stars</label>
                                            <input type="radio" id="star4" name="note" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                            <input type="radio" id="star3" name="note" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                            <input type="radio" id="star2" name="note" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                            <input type="radio" id="star1" name="note" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <input type="submit" value="Envoyer" class="btn btn_reserve" style="border-radius: 0;">
                                        </div>
                                    </form>
                                </div>
                                <?php if(@count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($error); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <?php echo e(Session::get('success')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/calendarReservation.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>