<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact Message-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5 mt-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-chat-square-dots"></i></div>
                    <h1 class="fw-bolder">Show Message</h1>
                    <p class="lead fw-normal text-muted mb-0">Your message here!</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="show-msg col-lg-8 col-xl-6">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('nama') || session('email') || session('pesan'))
                            <div class="alert alert-success">
                                @if (session('nama'))
                                    <p>Name: {{ session('nama') }}</p>
                                @endif
                                @if (session('email'))
                                    <p>Email: {{ substr_replace(session('email'), '***', 3, strpos(session('email'), '@') - 3) }}</p>
                                @endif
                                @if (session('pesan'))
                                    <p>Message: {{ session('pesan') }}</p>
                                @endif
                            </div>
                        @else
                            <div class="alert alert-danger text-center">No message sent!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>