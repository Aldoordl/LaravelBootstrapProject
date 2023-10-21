<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
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
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Dashboard</span></h2>
                            <a href="{{ route('admin.download-log') }}" class="btn btn-outline-primary float-end">Backup</a>
                        </div>

                        <!-- Activity Log -->
                        <div class="card">
                            <div class="card-header bg-white fw-bolder">
                                Recent Activity
                            </div>
                            <div class="card-body bg-light">
                                @if($activityLogs->isEmpty())
                                    <p>No activity logs available.</p>
                                @else
                                    <ul class="list-group list-group-flush rounded">
                                        @foreach ($activityLogs as $log)
                                            <li class="list-group-item bg-light">
                                                <strong>[{{ $log->created_at }}]</strong> {{ $log->activity }}:
                                                @if (strlen($log->description) > 75)
                                                    {{ substr($log->description, 0, 75) }}&hellip;
                                                @else
                                                    {{ $log->description }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <!-- Reset -->
                        <div class="card mt-4">
                            <div class="card-header bg-white fw-bolder">
                                Reset Database Tables
                            </div>
                            <div class="card-body bg-light">
                                <form method="POST" action="{{ route('admin.reset.tables') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="tables" class="form-label">Select Tables to Reset:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tables[]" value="activity_logs" id="activity_logs">
                                            <label class="form-check-label" for="activity_logs">
                                                Activity Logs
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tables[]" value="user_acc" id="user_acc">
                                            <label class="form-check-label" for="user_acc">
                                                User
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tables[]" value="" id="" disabled>
                                            <label class="form-check-label" for="">
                                                Resume
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tables[]" value="project_upload" id="project_upload">
                                            <label class="form-check-label" for="project_upload">
                                                Project
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tables[]" value="report_msg" id="report_msg">
                                            <label class="form-check-label" for="report_msg">
                                                Messages
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Reset Selected Tables</button>
                                </form>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>
