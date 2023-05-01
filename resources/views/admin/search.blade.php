@extends('layouts.app')
@section('content')
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="form-outline mb-4 mx-sm-3 mb-2">
      <input type="text" class="form-control" name="q"
      placeholder="Rechercher un utilisateur"> <span class="input-group-btn">
        <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </span>
    </div>
  </form>
  @if(isset($details))
  <div>
  <p> Le résultat pour votre recherche " <b>{{$query.''}}</b> " est</p>
</div>
  <table class="table table-striped mb-3 text-center">
    <thead>
      <tr>
        <th scope="col">Utilisateur</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($details as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endisset

  @endsection