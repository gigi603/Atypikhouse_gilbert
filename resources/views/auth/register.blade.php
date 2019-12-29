@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Inscrivez-vous</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nom" placeholder="Nom" value="{{ old('nom') }}">

                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" name="prenom" placeholder="Prénom" value="{{ old('prenom') }}">

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                            <label for="email-confirm" class="col-md-4 control-label">Confirmer email</label>

                            <div class="col-md-6">
                                <input id="email-confirm" type="text" class="form-control" name="email_confirmation" placeholder="Confirmez votre email" value="{{ old('email_confirmation') }}">
                                @if ($errors->has('email_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('date_birth') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Date de naissance</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="birthday" placeholder="Date de début" name="date_birth" value="{{ old('date_birth') }}" />
                                @if ($errors->has('date_birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Le site accessible par l’url www.atypikhouse.fr est exploité dans le respect de la législation française. L'utilisation de ce site est régie par les présentes conditions générales. En utilisant le site, vous reconnaissez avoir 18 ans ou plus et avoir pris connaissance de ces conditions et les avoir acceptées. Celles-ci pourront êtres modifiées à tout moment et sans préavis par la société Nom de la boite. Eurodev Agency ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service.</p>
                        </div>
                        <div class="form-group">
                            <p>Nous vous enverrons des promotions commerciales, des offres spéciales, des idées de voyage et des informations réglementaires par e-mail à conditions de cocher la case autorisant notre équipe à vous envoyer des newsletters</p>
                        </div>
                        <div class="form-check{{ $errors->has('conditions') ? ' has-error' : '' }} text-center">
                            <input type="checkbox" class="form-check-input" name="conditions" value="true" {{ !old('conditions') ?: 'checked' }}>
                            <label class="form-check-label" for="exampleCheck1">J'accepte les conditions générales</label>
                            @if ($errors->has('conditions'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('conditions') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label for="g-recaptcha-response" class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                            {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-color">
                                    M'inscrire
                                </button>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="newsletter" value="1" {{ old('newsletter') ? 'checked="checked"' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">Je souhaite recevoir de messages promotionnels d'Atypikhouse.<br/> Je peux également activer/désactiver cette option à tout moment<br/> dans les paramètres de mon compte ou via le lien contenu dans ce message.</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/recaptcha.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/calendarSubscribeUser.js') }}"></script>
@endsection
