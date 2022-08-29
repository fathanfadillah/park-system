@extends('layouts.app')
 
@section('content')
<div class="container">
    <p class="navbar-brand" href="#">Welcome, User</p>
    <a class="btn btn-block btn-primary" href="{{route('park.index')}}">Park</a>
</div>
@endsection