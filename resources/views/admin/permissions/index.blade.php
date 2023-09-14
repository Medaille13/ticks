@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Permissions</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        Créer une nouvelle permission
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
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                
                                
                                <form method="post" action="{{ route('permissions.destroy' , [$permission->id])}}" accept-charset="UTF-8" style="display:inline" id="form_{{$permission->id}}">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-danger" data-target="#deleteModal_{{$permission->id}}" data-toggle="modal">Supprimé</button></a>
                                    <div class="modal fade" id="deleteModal_{{$permission->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression de la permission : {{$permission->id}} {{$permission->name}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger" form="form_{{$permission->id}}">Yes</button>
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
