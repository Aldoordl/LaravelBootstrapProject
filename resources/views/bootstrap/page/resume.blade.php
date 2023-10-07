@extends('bootstrap.layout.app')

@section('title')
    <title>Resume - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.shared.resume-view') 
@endsection