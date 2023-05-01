<div class="card-body">
    @foreach($users as $user)
    <h5 class="card-title">Name : {{$user->name }}</h5>
    <p class="card-text">Email : {{$user->email }}</p>
    <p scope="row">Numéro : {{$user->id}}</p>
    @endforeach
  </div>