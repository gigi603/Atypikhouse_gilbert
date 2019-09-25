<?php $__env->startSection('title', 'Paiement'); ?>
<script src="https://js.stripe.com/v3/"></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
  <link href="<?php echo e(asset('css/base_stripe.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/stripe.css')); ?>" rel="stylesheet">
<?php $__env->startSection('content'); ?>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <?php if($message = Session::get('success')): ?>
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <?php echo $message; ?>

                </div>
                <?php Session::forget('success');?>
                <?php endif; ?>
                <?php if($message = Session::get('error')): ?>
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    <?php echo $message; ?>

                </div>
                <?php Session::forget('error');?>
                <?php endif; ?>
                <div class="panel-heading">Paywith Stripe</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="<?php echo e(route('addmoney.stripe')); ?>" >
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('card_no') ? ' has-error' : ''); ?>">
                            <label for="card_no" class="col-md-4 control-label">Numéro de carte</label>
                            <div class="col-md-6">
                                <input id="card_no" type="text" class="form-control" name="card_no" value="<?php echo e(old('card_no')); ?>" autofocus>
                                <?php if($errors->has('card_no')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('card_no')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('ccExpiryMonth') ? ' has-error' : ''); ?>">
                            <label for="ccExpiryMonth" class="col-md-4 control-label">Mois d'expiration</label>
                            <div class="col-md-6">
                                <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="<?php echo e(old('ccExpiryMonth')); ?>" autofocus>
                                <?php if($errors->has('ccExpiryMonth')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ccExpiryMonth')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('ccExpiryYear') ? ' has-error' : ''); ?>">
                            <label for="ccExpiryYear" class="col-md-4 control-label">Année d'expiration</label>
                            <div class="col-md-6">
                                <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="<?php echo e(old('ccExpiryYear')); ?>" autofocus>
                                <?php if($errors->has('ccExpiryYear')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ccExpiryYear')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('cvvNumber') ? ' has-error' : ''); ?>">
                            <label for="cvvNumber" class="col-md-4 control-label">CVV</label>
                            <div class="col-md-6">
                                <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="<?php echo e(old('cvvNumber')); ?>" autofocus>
                                <?php if($errors->has('cvvNumber')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cvvNumber')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="prix" value="<?php echo $prix; ?>" autofocus>
                        <input type="hidden" class="form-control" name="start_date" value=" <?php echo $startdate; ?>" autofocus>
                        <input type="hidden" class="form-control" name="end_date" value="<?php echo $enddate; ?>" autofocus>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Stripe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container list-category">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Etape du paiement</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                        <form action="<?php echo e(route('addmoney.stripe')); ?>" method="post" id="payment-form">
                            <div class="form-row" style="padding-bottom:30px;">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                                <input type="hidden" value="<?php echo($prix);?>" name="price"/>
                                <input type="hidden" value="<?php echo($startdate);?>" name="start"/>
                                <input type="hidden" value="<?php echo($enddate);?>" name="end"/>
                                <input type="hidden" value="<?php echo($total);?>" name="total"/>
                                <input type="hidden" value="<?php echo($nb_personnes);?>" name="nb_personnes"/>
                                <input type="hidden" value="<?php echo($days);?>" name="days"/>
                                <input type="hidden" value="<?php echo($house_id);?>" name="house_id"/>
                                <input type="hidden" value="<?php echo($user_id);?>" name="user_id"/>
                                <li><a href="<?php echo e(route('cgv')); ?>" target="_blank">Voir les conditions générales de ventes</a></li>
                                <div class="form-check<?php echo e($errors->has('agree') ? ' has-error' : ''); ?>">
                                    <input type="checkbox" class="form-check-input" name="agree" value="true" <?php echo e(!old('agree') ?: 'checked'); ?>>
                                    <label class="form-check-label" for="exampleCheck1">J'accepte les conditions générales de vente</label>
                                    <?php if($errors->has('agree')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('agree')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <button class="btn btn-success btn_reserve">Payer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo e(asset('js/stripe.js')); ?>"></script>        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>