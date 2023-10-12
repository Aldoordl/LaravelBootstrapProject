<main class="flex-shrink-0">
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <div class="container text-center">
                <!-- Alert Success -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            
                <h2 class="display-5 fw-bolder p-2"><span class="text-gradient d-inline">My Resume In Here</span></h2>
                <form method="GET" action="{{ route('resume.download') }}">
                    <button class="btn btn-primary px-5 py-3 fs-6 fw-bolder" type="submit">Download</button>
                </form>       
            </div>
        </div>
    </section>
</main>