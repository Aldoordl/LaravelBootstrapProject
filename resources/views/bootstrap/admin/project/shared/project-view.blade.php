<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            
            <!-- Alert Success -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    @include('bootstrap.layout.admin.sidebar')
            
                    <!-- Content -->
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        @if($projects->isEmpty())
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Project</span></h2>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Something's not right!</h2>
                                        <p>Add your new project now!</p>
                                        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Create Project</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
                        @else
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Project</span></h2>
                                <a class="btn btn-outline-primary" href="{{ route('admin.projects.create') }}">Create Project</a>
                            </div>
                            <!-- Content Here -->
                            <ul class="list-group">
                                @foreach($projects as $project)
                                    <li class="list-group-item">
                                        <div>
                                            <h5 class="card-title mb-3 fw-bolder">{{ $project->title }}</h5>
                                            <p class="card-text">{{ $project->description }}</p>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary me-2">Edit</a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>
