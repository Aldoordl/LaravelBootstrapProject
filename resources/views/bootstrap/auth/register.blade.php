@extends('bootstrap.layout.app')

<style>
    ::-webkit-scrollbar{
        display: none
    }
</style>

@section('title')
    <title>Register - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.auth.shared.register-view') 
@endsection