@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>TITRE ROLE</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        Créer un nouveau role 
                    </a>
                    <div>@include('flash-message')</div>
                    <br/>
                    <br/>
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>             
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                
                                
                                <form method="post" action="{{ route('roles.destroy' , [$role->id])}}" accept-charset="UTF-8" style="display:inline" id="form_{{$role->id}}">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-danger" data-target="#deleteModal_{{$role->id}}" data-toggle="modal">Supprimé</button></a>
                                    <div class="modal fade" id="deleteModal_{{$role->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression du role : {{$role->id}} {{$role->name}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger" form="form_{{$role->id}}">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                                
                                
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>          
            </div>
        </div>
    </div>
</div>
@endsection
