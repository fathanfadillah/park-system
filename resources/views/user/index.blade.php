@extends('layouts.app')
 
@section('content')
<div class="container">
    <p class="navbar-brand" href="#">Welcome, User</p>
    <a class="btn btn-block btn-primary" href="{{route('park.index')}}">Park</a>
    <a class="btn btn-block btn-danger" href="{{route('park.exit.index')}}">Exit</a>
</div>
@endsection