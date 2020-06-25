<?php $__env->startSection('title', 'Confirmation payement'); ?>
<?php $__env->startSection('link'); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container margin-top block-size">
        <div class="panel panel-default">
            <div class="panel-heading text-center">Confirmation de votre paiement</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                            <p class="card-text">Vous avez bien payer pour le <?php \Date::setLocale('fr'); $startdate = Date::parse($reservation->start_date)->format('l j F Y'); echo($startdate);?> au <?php \Date::setLocale('fr'); $enddate = Date::parse($reservation->end_date)->format('l j F Y'); echo($enddate);?></p>
                            <p class="card-text">Vous pouvez consulter votre réservation dans la rubrique "mes réservations" ou cliquez directement sur le bouton en dessous</p>
                            <p class="card-text">Notre équipe vous remercie</p>
                            <div>
                                <a class="btn btn-success btn_reserve" href="<?php echo e(route('user.reservations')); ?>">Consulter mes réservations</a>
                            </div> 
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="<?php echo e(asset('js/calendar.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/date_french.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>