@extends('layouts.app')
@section('title', 'Comfirmation inscription')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Confirmation inscription</div>
					<div class="panel-body">
						Votre compte a bien été validé. Vous pouvez dès à présent vous connecter sur notre<a href="{{url('/login')}}">site</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection