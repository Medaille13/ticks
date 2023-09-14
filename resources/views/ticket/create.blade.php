@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row" style="margin:10px;">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-center">
          <h3>Nouveau ticket</h3>
        </div>
        <div class="panel-body ">
          <form action="{{ route('tickets.store') }}" class="form-horizontal"  role="form" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label for="title" class="col-md-4 control-label">Title</label>
              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="category" class="col-md-4 control-label">Category</label>
              <div class="col-md-6">
                <select id="category" type="category" class="form-control" name="category">
                  <option value="">Sélectionnez la catégorie</option>
                  <option value="comptabilite">Logiciel comptable</option>
                  <option value="administritatif">Logiciel administratif</option>
                  <option value="site">Site Web</option>
                  <option value="autre">Autre</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="priority" class="col-md-4 control-label">Priority</label>
              <div class="col-md-6">
                <select id="priority" type="" class="form-control" name="priority">
                  <option value="">Sélectionnez la priorité</option>
                  <option value="low">Low</option>
                  <option value="medium">Medium</option>
                  <option value="high">High</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="message" class="col-md-4 control-label">Message</label>
              <div class="col-md-6">
                <textarea rows="10" id="message" class="form-control" name="content"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary" name="">
                  <i class="fa fa-btn fa-ticket"></i> Open Ticket
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
  
  @endsection