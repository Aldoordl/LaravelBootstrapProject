<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi-files"></i></div>
                <h1 class="fw-bolder">Edit Project</h1>
                <p class="lead fw-normal text-muted mb-0">Update your project!</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- Form Request Validation Errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Create Form -->
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder=" " value="{{ old('title', $project->title) }}" required>
                            <label for="title">Title</label>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder=" " style="height: 10rem; resize: none;" required>{{ old('description', $project->description) }}</textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>