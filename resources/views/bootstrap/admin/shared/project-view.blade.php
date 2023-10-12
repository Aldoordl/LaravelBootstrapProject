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
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Project</span></h2>
                        </div>
            
                        <!-- Content Here -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header bg-white fw-bolder">
                                        Recent Contents
                                    </div>
                                    <div class="card-body bg-light">
                                        <!-- Content for sales statistics -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow">
                                    <div class="card-header bg-white fw-bolder">
                                        Statistics
                                    </div>
                                    <div class="card-body bg-light">
                                        <!-- Content for sales statistics -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>