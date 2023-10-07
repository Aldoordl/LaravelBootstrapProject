@extends('bootstrap.layout.app')

@section('title')
    <title>Admin Dashboard</title>    
@endsection

@section('content')
<div class="container text-center">
    <h2 class="display-5 fw-bolder p-5"><span class="text-gradient d-inline">Download Successfully!</span></h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" type="submit">Logout</button>
    </form>    
</div>
@endsection