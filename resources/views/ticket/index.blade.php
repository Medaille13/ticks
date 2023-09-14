@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin:20px;">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Liste des tickets</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('tickets.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        Créer un nouveau ticket
                    </a>
                    <div>@include('flash-message')</div>
                    <br/>
                    <br/>
                    <table class="table table-bordered">
                        <tr>
                            <th>Auteur</th>
                            <th>Titre</th>                            
                            <th>Catégorie</th>
                            <th>Priorité</th>
                            <th width="170px">Action</th>
                            <th>Nbr</th>
                        </tr>             
                        @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->user->email}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->category}}</td>
                            <td>{{$ticket->priority}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Voir</a>
                                
                                
                                <form method="post" action="{{ route('tickets.destroy' , [$ticket->id])}}" accept-charset="UTF-8" style="display:inline" id="form_{{$ticket->id}}">
                                    @method('DELETE')
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-danger" data-target="#deleteModal_{{$ticket->id}}" data-toggle="modal">Supprimé</button></a>
                                    <div class="modal fade" id="deleteModal_{{$ticket->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression du ticket : {{$ticket->title}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Voulez-vous vraiment supprimer?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">No</button>
                                                    <button type="submit" class="btn btn-danger" form="form_{{$ticket->id}}">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </form>    
                            </td>
                            <td>{{$ticket->discutions->count()}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>          
            </div>
        </div>
    </div>
</div>
@endsection