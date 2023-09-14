@extends('layouts.app')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Création de role</div>
    @include('flash-message')
    <div class="card-body">    
      @include('flash-message')

      <form action="{{ route('roles.store') }}" method="post">
        {!! csrf_field() !!}
        @include('flash-message')
        <label>Nom</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
        @include('flash-message')
      </form>
    </div>
  </div>








@endsection