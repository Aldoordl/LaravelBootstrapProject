<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-door-closed"></i></div>
                    <h1 class="fw-bolder">Sign Up</h1>
                    <p class="lead fw-normal text-muted mb-0">Already have an account? <a href="{{ route('login') }}" style="text-decoration: none">Sign in</a></p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- Form Request Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger text-center">
                                Form failed to send!
                            </div>
                        @endif

                        <!-- Contact Form -->
                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf
                            <!-- Name input -->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder=" " value="{{ old('name') }}" />
                                <label for="name">Full name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Email address input -->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder=" " value="{{ old('email') }}" />
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Password input -->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder=" " />
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>