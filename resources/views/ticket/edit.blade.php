@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row" style="margin:10px;">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between bg-primary">
          <h3><span class="badge  text-bg-info">{{$ticket->category}}</span></h3>      
          <h3>Discussion: {{$ticket->title }} <a>({{$ticket->discutions_count}})</a></h3>
          <h3><span class="badge  text-bg-danger">{{$ticket->priority}}</span></h3>       
        </div>
        <div class="card p-2">
          <div class="card-body">{{$ticket->user->name}} {{$ticket->content}}</div>
          @foreach ($ticket->discutions_users as $discution)
          <div class="card-body bg-primary">{{$discution->user->name}} : {{$discution->content}}</div>
          @endforeach
          <div class="card-footer bg-primary">
            <form action="{{ route('ticket.reponse', [$ticket->id]) }}" class="form-horizontal"  role="form" method="POST">
              {!! csrf_field() !!}
              <div class="form-group">
                <div>
                  <textarea rows="10" id="message" class="form-control" name="content" placeholder="Ma réponse"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mt-3" name="">
                    <i class="fa fa-btn fa-ticket"></i> Répondre
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  @endsection