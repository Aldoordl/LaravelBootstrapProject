@extends('bootstrap.layout.app')

@section('title')
    <title>Admin Dashboard</title>    
@endsection

@section('content')
    @include('bootstrap.admin.project.shared.edit-view')
@endsection