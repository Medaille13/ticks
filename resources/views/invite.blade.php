@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Inviter un nouvel utilisateur</div>
            <div class="card-body">
                <form action="{{ route('invite') }}" method="post" >
                    {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        
                        <div class="col-md-6">
                            <input id="name" name="name" type="text" class="form-control " required autocomplete="name" autofocus>
                        </div>  
                            
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" required autofocus>
                                <button type="submit"class="form-control">Envoyer l'invitation</button>                   
                            </div>
                </form>
@endsection