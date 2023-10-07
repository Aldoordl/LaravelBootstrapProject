@extends('bootstrap.layout.app')

<style>
    ::-webkit-scrollbar{
        display: none
    }
</style>

@section('title')
    <title>Login - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.auth.shared.login-view') 
@endsection