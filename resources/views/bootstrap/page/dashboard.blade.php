@extends('bootstrap.layout.app')

<style>
    ::-webkit-scrollbar{
        display: none
    }
</style>

@section('title')
    <title>Dashboard - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.page.shared.head-view') 
@endsection