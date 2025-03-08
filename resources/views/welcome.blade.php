@extends('layout.web')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to,<br>Library Web</h2>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('detail.book') }}" class="btn-get-started">Get Started</a>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-2">

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $user }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total User</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $book }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Book</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-4 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $borrowings }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Total Borrowing</p>
                    </div>
                </div><!-- End Stats Item -->
            </div>
        </div>
    </section><!-- /Counts Section -->
@endsection
