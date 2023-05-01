@extends('layouts.app')

@section('content')
    <h1 class="text-center">CRUD</h1>   
<div>  
  <table class="table table-striped mb-3 text-center">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Action</th>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          <form action="{{ route('edit' , [$user->id])}}">
            <button class="btn btn-danger" type="submit">Update</button>
        </td>
        <td>
          <form action="{{ route('deleteusers' , [$user->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
      </td>
      </tr>
      @endforeach      
      @endsection