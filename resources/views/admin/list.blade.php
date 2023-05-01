@extends('layouts.app')

@section('content')
<h1 class="text-center">Liste des utilisateurs</h1>  
<div>  
  <table class="table table-striped mb-3 text-center">
    <thead class="thead-dark">
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Email</th>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
        </tr>
        @endforeach      
        @endsection