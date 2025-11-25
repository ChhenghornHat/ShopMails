@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Dashboard')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <!-- Dashboard: Start -->
    <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
            <img src="{{ asset('assets/img/front-pages/backgrounds/hero-bg.png') }}" alt="hero background" class="position-absolute top-0 start-50 translate-middle-x object-fit-cover w-100 h-100" data-speed="1" />
            <div class="container">
                <div class="hero-text-box text-center position-relative">
                    <h1 class="text-primary hero-title display-6 fw-extrabold">We are provide the mail services</h1>
                    <h2 class="hero-sub-title h6 mb-6">
                        Production-ready & easy to use Mail Service<br class="d-none d-lg-block" />
                        for Reliability and Customizability.
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard: End -->
@endsection
