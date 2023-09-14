@extends('layouts.app')
@section('content')
<div class="card" style="margin:20px;">
  <div class="card-header">Création d'un nouvel utilisateur</div>
  @include('flash-message')
  <div class="card-body">    
    @include('flash-message')
    <form action="{{ route('crud.store') }}" method="post">
      {!! csrf_field() !!}
      @include('flash-message')
      <label>Nom</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>
      <label>Email</label></br>
      <input type="email" name="email" id="address" class="form-control"></br>
      <label>Mot de passe</label></br>
      <input type="password" name="password" id="password" class="form-control"></br>
      <label>Role de l'utilisateur :</label>
      <select class="form-select" name="role" aria-label="Default select example">
        @foreach ($roles as $role)          
        <option value="{{ $role->name }}">{{ $role->name }}</option>
        @endforeach      
      </select></br>   
      <input type="submit" value="Save" class="btn btn-success"></br>
      @include('flash-message')
    </form>
  </div>
</div>

@endsection