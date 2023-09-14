@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Utilisateurs inscrit</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('crud.create') }}" class="btn btn-success btn-sm" title="Nouvel utilisateur">
                        Créer un nouvel utilisateur 
                    </a>
                    <div>@include('flash-message')</div>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>

                                    <td>
                                        <button class="btn btn-info btn-sm" title="Vue utilisateur" data-target="#infoModal" data-toggle="modal" ><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <div class="modal fade" id="infoModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Information sur l'utilisateur : {{$user->name}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Son nom : {{$user->name}}</p>
                                                        <p>Inscrit depuis le : {{$user->created_at->translatedFormat('d/m/Y H:i:s' )}}</p>
                                                        <p>Son email : {{$user->email}}</p>
                                                        <p>Son rôle : {{ $user->getRoleNames()->implode(', ') }}</p>                                                        
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>            
                                        
                                        <a href="{{ route('crud.edit' , [$user->id])}}" title="Edition de l'utilisateur"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        
                                        <form method="post" action="{{ route('crud.destroy' , [$user->id])}}" accept-charset="UTF-8" style="display:inline">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-danger btn-sm" title="Supprimer l'utilisateur" data-target="#deleteModal_{{$user->id}}" data-toggle="modal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal_{{$user->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression de l'utilisateur : {{$user->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                          
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection