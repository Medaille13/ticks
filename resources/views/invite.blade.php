@extends('layouts.app')
@section('content')

<form action="{{ route('invite') }}" method="post" >
    {{ csrf_field() }}
    <input type="email" name="email" class="rounded mx-auto d-block"/>
    <button type="submit"class="rounded mx-auto d-block">Send invite</button>
</form>
<img src="{{ asset('img/pink-envelope.gif') }}" class="rounded mx-auto d-block" alt="Responsive image">
@endsection