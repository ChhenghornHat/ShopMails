@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Price of Service')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <!-- Pricing plans: Start -->
    <section id="landingPricing" class="section-py bg-body landing-pricing">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge bg-label-primary">Price of Service</span>
            </div>
            <h4 class="text-center mb-1">
                <span class="position-relative fw-extrabold z-1">
                    Tailored pricing plans
                    <img src="{{ asset('assets/img/front-pages/icons/section-title-icon.png') }}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
                </span>
                designed for you
            </h4>
            <p class="text-center pb-2 mb-7">All plans include</p>
            <div class="row g-6 pt-lg-5">
                <!-- Basic Plan: Start -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/paper-airplane.png') }}" alt="paper airplane icon" class="mb-8 pb-2" />
                                <h4 class="mb-0">Hotmail</h4>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="price-monthly h2 text-primary fw-extrabold mb-0">$0.50</span>
                                    <sub class="h6 text-body-secondary mb-n1 ms-1">/mail</sub>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled pricing-list">
                                <li>
                                    <h6 class="d-flex align-items-center mb-3">
                                        <span class="badge badge-center rounded-pill bg-label-primary p-0 me-3">
                                            <i class="icon-base ti tabler-check icon-12px"></i>
                                        </span>
                                        Basic Support
                                    </h6>
                                </li>
                            </ul>
                            <div class="d-grid mt-8">
                                <a href="" class="btn btn-label-primary">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Plan: End -->

                <!-- Favourite Plan: Start -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card border border-primary shadow-xl">
                        <div class="card-header">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/plane.png') }}" alt="plane icon" class="mb-8 pb-2" />
                                <h4 class="mb-0">Outlook Email</h4>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="price-monthly h2 text-primary fw-extrabold mb-0">$1</span>
                                    <sub class="h6 text-body-secondary mb-n1 ms-1">/mail</sub>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled pricing-list">
                                <li>
                                    <h6 class="d-flex align-items-center mb-3">
                                        <span class="badge badge-center rounded-pill bg-primary p-0 me-3"><i class="icon-base ti tabler-check icon-12px"></i></span>
                                        Everything in basic
                                    </h6>
                                </li>
                            </ul>
                            <div class="d-grid mt-8">
                                <a href="" class="btn btn-primary">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Favourite Plan: End -->

                <!-- Standard Plan: Start -->
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <img src="{{ asset('assets/img/front-pages/icons/shuttle-rocket.png') }}" alt="shuttle rocket icon" class="mb-8 pb-2" />
                                <h4 class="mb-0">Gmail</h4>
                                <div class="d-flex align-items-center justify-content-center">
                                    <span class="price-monthly h2 text-primary fw-extrabold mb-0">$1.50</span>
                                    <sub class="h6 text-body-secondary mb-n1 ms-1">/mail</sub>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled pricing-list">
                                <li>
                                    <h6 class="d-flex align-items-center mb-3">
                                        <span class="badge badge-center rounded-pill bg-label-primary p-0 me-3">
                                            <i class="icon-base ti tabler-check icon-12px"></i>
                                        </span>
                                        Everything in premium
                                    </h6>
                                </li>
                            </ul>
                            <div class="d-grid mt-8">
                                <a href="" class="btn btn-label-primary">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Standard Plan: End -->
            </div>
        </div>
    </section>
    <!-- Pricing plans: End -->
@endsection
