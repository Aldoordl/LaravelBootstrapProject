<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            
            <div class="container-fluid">
                <div class="row">
                    <!-- Sidebar -->
                    @include('bootstrap.layout.admin.sidebar')
            
                    <!-- Content -->
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Profile</span></h2>
                        </div>
                        <!-- Content Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-white fw-bolder">
                                        Set Admin
                                    </div>
                                    <div class="card-body bg-light">
                                        <!-- Form untuk mengubah peran pengguna -->
                                        <form method="POST" action="{{ route('admin.updateRole') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">User Email</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role</label>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change User Role</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-white fw-bolder">
                                        User List
                                    </div>
                                    <div class="card-body bg-light">
                                        <ul>
                                            @foreach($users as $user)
                                                <li>
                                                    {{ $user->email }}
                                                    @if($user->isAdmin())
                                                        [admin]
                                                    @else
                                                        [user]
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Daftar Pengguna dan Tombol Delete -->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h3 class="fw-bolder border-bottom pb-2"><span class="text-gradient d-inline">User Accounts</span></h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->isAdmin())
                                                        Admin
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->status)
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-danger">Offline</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('admin.delete', $user->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>
</main>