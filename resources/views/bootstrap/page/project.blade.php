@extends('bootstrap.layout.app')

@section('title')
    <title>Projects - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.page.shared.project-view') 
@endsection