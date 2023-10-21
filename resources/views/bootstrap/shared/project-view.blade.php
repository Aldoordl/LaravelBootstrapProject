<main class="flex-shrink-0">
    <!-- Projects Section-->
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                @auth
                    @if(auth()->user()->role === 'admin')
                        @if ($projects->isEmpty())
                            <div class="col-lg-11 col-xl-9 col-xxl-8">
                                <!-- View Card for Admin with No Projects -->
                                <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="p-5">
                                                <h2 class="fw-bolder">Set up a project</h2>
                                                <p>Click here to create a new project.</p>
                                                <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">
                                                    <div class="d-inline-block bi-arrow-right-circle me-2"></div>
                                                    Set up
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-11 col-xl-9 col-xxl-8">
                                <!-- View Card for Admin with Projects -->
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h2 class="text-primary fw-bolder mb-0">Set up project</h2>
                                    <a class="btn btn-primary px-4 py-3" href="{{ route('admin.projects.index') }}">
                                        <div class="d-inline-block bi-arrow-right-circle me-2"></div>
                                        Goo!!
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endif
                @endauth

                @if ($projects->isNotEmpty())
                    @foreach($projects as $project)
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Project Card -->
                            <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                            <h2 class="fw-bolder">{{ $project->title }}</h2>
                                            <p>{{ $project->description }}</p>
                                        </div>
                                        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 19em"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- View Card for Non-Admin with No Projects -->
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <h2 class="fw-bolder">Projects Not Yet Uploaded</h2>
                                        <p>The owner hasn't uploaded or added the project yet!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Call to action section-->
    <section class="py-5 bg-gradient-primary-to-secondary text-white">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="display-4 fw-bolder mb-4">Let's build something together</h2>
                <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('contact') }}">Contact me</a>
            </div>
        </div>
    </section>
</main>
