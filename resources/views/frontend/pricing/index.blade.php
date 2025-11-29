@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Price of Service')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <!-- Pricing Plans -->
    <section class="section-py first-section-pt">
        <div class="container">
            <h2 class="text-center mb-2">Pricing Plans</h2>
            <p class="text-center pb-3">All plans include</p>

            <div class="row g-6">
                <!-- Custom -->
                <div class="col-lg">
                    <div class="card border rounded shadow-none">
                        <div class="card-body pt-12 px-5">
                            <div class="mt-3 mb-5 text-center">
                                <img src="{{ asset('assets/img/illustrations/page-pricing-basic.png') }}" alt="Custom Image" height="120" />
                            </div>
                            <h4 class="card-title text-center text-capitalize mb-1">Custom</h4>
                            <p class="text-center mb-5">Custom mail account for Facebook</p>
                            <div class="text-center h-px-50">
                                <div class="d-flex justify-content-center">
                                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                    <h1 class="mb-0 text-primary">.30</h1>
                                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">/mail</sub>
                                </div>
                            </div>

                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">Unlimited responses</li>
                            </ul>
                            <a href="" class="btn btn-label-success d-grid w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <!-- Gmail -->
                <div class="col-lg">
                    <div class="card border-primary border shadow-none">
                        <div class="card-body position-relative pt-4 px-5">
                            <div class="position-absolute end-0 me-5 top-0 mt-4">
                                <span class="badge bg-label-primary rounded-1">Gmail</span>
                            </div>
                            <div class="my-5 pt-6 text-center">
                                <img src="{{ asset('assets/img/illustrations/page-pricing-standard.png') }}" alt="Standard Image" height="120" />
                            </div>
                            <h4 class="card-title text-center text-capitalize mb-1">Gmail</h4>
                            <p class="text-center mb-5">Gmail account for Facebook</p>
                            <div class="text-center h-px-50">
                                <div class="d-flex justify-content-center">
                                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                    <h1 class="price-toggle price-yearly text-primary mb-0">.50</h1>
                                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">/mail</sub>
                                </div>
                            </div>

                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">Unlimited responses</li>
                            </ul>
                            <a href="" class="btn btn-primary d-grid w-100">Get Started</a>
                        </div>
                    </div>
                </div>

                <!-- Outlook -->
                <div class="col-lg">
                    <div class="card border rounded shadow-none">
                        <div class="card-body pt-12 px-5">
                            <div class="mt-3 mb-5 text-center">
                                <img src="{{ asset('assets/img/illustrations/page-pricing-enterprise.png') }}" alt="Outlook Image" height="120" />
                            </div>
                            <h4 class="card-title text-center text-capitalize mb-1">Outlook</h4>
                            <p class="text-center mb-5">Outlook account for Facebook</p>

                            <div class="text-center h-px-50">
                                <div class="d-flex justify-content-center">
                                    <sup class="h6 text-body pricing-currency mt-2 mb-0 me-1">$</sup>
                                    <h1 class="price-toggle price-yearly text-primary mb-0">.40</h1>
                                    <sub class="h6 text-body pricing-duration mt-auto mb-1 ms-1">/mail</sub>
                                </div>
                            </div>
                            <ul class="list-group ps-6 my-5 pt-9">
                                <li class="mb-4">Unlimited responses</li>
                            </ul>
                            <a href="" class="btn btn-label-primary d-grid w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Pricing Plans -->
@endsection
