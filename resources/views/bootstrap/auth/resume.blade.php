@extends('bootstrap.layout.app')

@section('title')
    <title>Download Resume</title>    
@endsection

@section('content')
<div class="container text-center">
    <h2 class="display-5 fw-bolder p-5"><span class="text-gradient d-inline">My Resume In Here</span></h2>
    <form method="GET" action="{{ route('resume.download') }}">
        <button class="btn btn-primary px-5 py-3 fs-6 fw-bolder" type="submit">Download</button>
    </form>       
</div>
@endsection