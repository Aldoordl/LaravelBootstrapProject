@extends('bootstrap.layout.app')

@section('title')
    <title>Contact - {{ config('app.name') }}</title>    
@endsection

@section('content')
   @include('bootstrap.page.shared.contact-view') 
@endsection