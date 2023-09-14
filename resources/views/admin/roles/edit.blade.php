@extends('layouts.app')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Edition du rôle</div>
    <div class="card-body">    

      <form action="{{ route('roles.update', [$role->id]) }}" method="post">
        {!! csrf_field() !!}
        @method('PATCH')
        <div class="form-group">
        <label for="name">Le rôle</label></br>
        <input type="text" name="nom" id="name" class="form-control" value="{{old('nom') ?? $role->name}}"></br>
      </div>
        <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    </div>
  </div>

@endsection