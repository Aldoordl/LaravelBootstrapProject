<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    @include('bootstrap.layout.admin.sidebar')
            
                    <!-- Content -->
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Dashboard</span></h2>
                        </div>
            
                        <!-- Activity Log -->
                        <div class="card mb-4">
                            <div class="card-header bg-white fw-bolder">
                                Recent Activity
                                <a href="{{ route('admin.download-log') }}" class="btn btn-sm btn-primary float-end">Download Log</a>
                            </div>
                            <div class="card-body bg-light">
                                <ul class="list-group list-group-flush rounded">
                                    @foreach ($activityLogs as $log)
                                        <li class="list-group-item">
                                            <strong>[{{ $log->created_at }}]</strong> {{ $log->activity }}: {{ $log->description }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>
