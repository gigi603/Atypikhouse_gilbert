@extends('layouts.app')
@section('title', 'Paiement par stripe')
@section('footer', 'footer_absolute')

 
@section('content')
<div class="container margin-top block-size">
    <div class="panel panel-default marginTop">
        <div class="panel-heading text-center">Etape du paiement</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card h-100 text-center">
                        <form action="{{route('addmoney.stripe')}}" method="post" id="payment-form">
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
                                <li><a href="{{ route('cgv') }}" target="_blank">Voir les conditions générales de ventes</a></li>
                                <div class="form-check{{ $errors->has('agree') ? ' has-error' : '' }}">
                                    <input type="checkbox" class="form-check-input" name="agree" value="true" {{ !old('agree') ?: 'checked' }}>
                                    <label class="form-check-label" for="exampleCheck1">J'accepte les conditions générales de vente</label>
                                    @if ($errors->has('agree'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agree') }}</strong>
                                        </span>
                                    @endif
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
<script src="{{ asset('js/stripe.js') }}"></script>        
@endsection
