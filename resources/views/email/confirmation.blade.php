<h1>Bienvenue {{ $prenom }}</h1>
<p>Cliquez sur le lien afin de valider <a href="{{url('/users/confirmation'.$email_token)}}">votre compte</a></p>
<p>Une fois votre compte validée vous pourrez vous connecter</p>
<p>Notre équipe vous remercie.</p>