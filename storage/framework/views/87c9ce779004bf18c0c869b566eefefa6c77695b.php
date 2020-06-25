<?php $__env->startSection('title', 'Paiement par stripe'); ?>
<?php $__env->startSection('footer', 'footer_absolute'); ?>

 
<?php $__env->startSection('content'); ?>
<div class="container margin-top block-size">
    <div class="panel panel-default marginTop">
        <div class="panel-heading text-center">Etape du paiement</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                        <form action="<?php echo e(route('addmoney.stripe')); ?>" method="post" id="payment-form">
                            <div class="form-row" style="padding-bottom:30px;">
                                <label for="card-element">
                                Carte de crédit
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