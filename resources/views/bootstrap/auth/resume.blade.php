@extends('bootstrap.layout.app')

@section('title')
    <title>Download Resume</title>    
@endsection

@section('content')
   @include('bootstrap.auth.shared.resume-view') 
@endsection