@extends('layouts.app')
@section('content')

<div class="card" style="margin:20px;">
    <div class="card-header">Edition d'un utilisateur</div>
    <div class="card-body">
        @foreach($users as $user)
        <form action="{{ url('admin/edit' .$user->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></br>
            <label>Address</label></br>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"></br>
            <label>Mobile</label></br>
            <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>   
        @endforeach
    </div>
</div>

@endsection