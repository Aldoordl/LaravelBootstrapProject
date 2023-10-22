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
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
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
                                {{-- <a class="btn btn-outline-primary" href="{{ route('admin.projects.create') }}">Create Project</a> --}}
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white fw-bolder">
                                            Create Project
                                        </div>
                                        <div class="card-body bg-light">
                                            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder=" " value="{{ old('title') }}" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="image">Image</label>
                                                    <input type="file" class="form-control" id="image" name="image" required accept="image/*">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder=" " style="height: 5rem; resize: none;" required>{{ old('description') }}</textarea>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Create Project</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Content Here -->
                                <div class="col-md-12">
                                    {{-- <table class="table">
                                        <tr>
                                            <th>Image</th>
                                            <th class="pe-5">Title</th>
                                            <th>Description</th>
                                            <th colspan="2">Action</th> 
                                        </tr>
                                            @foreach($projects as $project)
                                                <tr>
                                                    <td><img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 4em"/></td>
                                                    <td>{{ $project->title }}</td>
                                                    <td>{{ $project->description }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-outline-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </table> --}}
                                    {{-- <a href="{{ route('admin.reports.reset') }}" class="btn btn-outline-danger btn-sm mt-3 float-end">Reset</a> --}}
                                </div>
                            <ul class="list-group">
                                @foreach($projects as $project)
                                    <li class="list-group-item">
                                        <div class="p-1 py-2">
                                            <h5 class="card-title mb-3 fw-bolder">{{ $project->title }}</h5>
                                            <p class="card-text">{{ $project->image }}</p>
                                            <p class="card-text">{{ $project->description }}</p>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary me-2">Edit</a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
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
