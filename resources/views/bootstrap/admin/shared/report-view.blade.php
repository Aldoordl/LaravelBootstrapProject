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
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Report</span></h2>
                        </div>
            
                        <!-- Content Here -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                @if ($messages->isEmpty())
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center">
                                                <div class="p-5">
                                                    <h2 class="fw-bolder">Something's not right!</h2>
                                                    <p>No messages were sent.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @else
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Action</th> <!-- Kolom baru untuk tombol Hapus -->
                                            </tr>
                                        @foreach($messages as $message)
                                            <tr>
                                                <td>{{ $message->nama }}</td>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->pesan }}</td>
                                                <td>
                                                    <form action="{{ route('admin.reports.delete', ['id' => $message->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                                {{-- <a href="{{ route('admin.reports.reset') }}" class="btn btn-outline-danger btn-sm mt-3 float-end">Reset</a> --}}
                            </div>
                        </div>
                        
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>