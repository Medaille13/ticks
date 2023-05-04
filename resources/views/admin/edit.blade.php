@extends('layouts.app')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Edition de l' utilisateur</div>
  <div class="card-body">
    
    <form action="{{ route('crud.update' , [$user->id]) }}" method="post">
      {!! csrf_field() !!}
      @method('PATCH')
      <label>Nom :</label></br>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name}}"></br>
      <label>Email:</label></br>
      <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? $user->email}}"></br>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
    
  </div>
</div>

@endsection