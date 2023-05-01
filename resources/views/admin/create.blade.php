@extends('layouts.app')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Création d'un nouvel utilisateur</div>
  <div class="card-body">
    
    <form action="{{ url('users') }}" method="post">
      {!! csrf_field() !!}
      <label>Nom</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>
      <label>Email</label></br>
      <input type="email" name="email" id="address" class="form-control"></br>
      <label>Mot de passe</label></br>
      <input type="password" name="password" id="password" class="form-control"></br>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>

@endsection