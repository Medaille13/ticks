<p>Bonjour {{$invite->name}}</p>
 
<p>Vous avez reçu une invitation, de la part de Ticketing Management, veuillez suivre le lien ci-dessous pour activer votre compte</p>
 
<a href="{{ route('registeremail' , $invite->token) }}">Lien d'activation!</a>