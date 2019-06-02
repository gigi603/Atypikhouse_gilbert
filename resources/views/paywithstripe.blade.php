@extends('layouts.app')
@section('title', 'Paiement')
<script src="https://js.stripe.com/v3/"></script>

  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
  <link href="{{ asset('css/base_stripe.css') }}" rel="stylesheet">
<link href="{{ asset('css/stripe.css') }}" rel="stylesheet">
@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif
                <div class="panel-heading">Paywith Stripe</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{route('addmoney.stripe')}}" >
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('card_no') ? ' has-error' : '' }}">
                            <label for="card_no" class="col-md-4 control-label">Numéro de carte</label>
                            <div class="col-md-6">
                                <input id="card_no" type="text" class="form-control" name="card_no" value="{{ old('card_no') }}" autofocus>
                                @if ($errors->has('card_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('card_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryMonth') ? ' has-error' : '' }}">
                            <label for="ccExpiryMonth" class="col-md-4 control-label">Mois d'expiration</label>
                            <div class="col-md-6">
                                <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" autofocus>
                                @if ($errors->has('ccExpiryMonth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ccExpiryYear') ? ' has-error' : '' }}">
                            <label for="ccExpiryYear" class="col-md-4 control-label">Année d'expiration</label>
                            <div class="col-md-6">
                                <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" autofocus>
                                @if ($errors->has('ccExpiryYear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccExpiryYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cvvNumber') ? ' has-error' : '' }}">
                            <label for="cvvNumber" class="col-md-4 control-label">CVV</label>
                            <div class="col-md-6">
                                <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('cvvNumber') }}" autofocus>
                                @if ($errors->has('cvvNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvvNumber') }}</strong>
                                    </span>
                                @endif
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
                        <form action="{{route('addmoney.stripe')}}" method="post" id="payment-form">
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
                                <input type="hidden" value="<?php echo($days);?>" name="days"/>
                                <input type="hidden" value="<?php echo($house_id);?>" name="house_id"/>
                                <input type="hidden" value="<?php echo($user_id);?>" name="user_id"/>
                                <li><a href="{{ route('cgv') }}">Voir les conditions générales de ventes</a></li>
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
