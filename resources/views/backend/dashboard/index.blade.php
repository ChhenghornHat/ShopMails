@extends('layouts.contentNavbarLayout')

@section('title', 'Dashboard')

@section('vendor-styles')

@endsection

@section('page-styles')

@endsection

@section('content')
    <div class="row g-6">
        <!-- Sale Amount -->
        <div class="col-lg-3 col-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="badge rounded p-2 bg-label-danger mb-2"><i class="icon-base ti tabler-currency-dollar icon-lg"></i></div>
                    <h5 class="card-title mb-1">1.5k</h5>
                    <p class="mb-0">Sale Amount (Monthly)</p>
                </div>
            </div>
        </div>

        <!-- User Subscribers -->
        <div class="col-lg-3 col-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="badge rounded p-2 bg-label-success mb-2"><i class="icon-base ti tabler-users icon-lg"></i></div>
                    <h5 class="card-title mb-1">3.4k</h5>
                    <p class="mb-0">User Subscribers</p>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="col-lg-3 col-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="badge rounded p-2 bg-label-danger mb-2"><i class="icon-base ti tabler-report icon-lg"></i></div>
                    <h5 class="card-title mb-1">3.4k</h5>
                    <p class="mb-0">Email</p>
                </div>
            </div>
        </div>

        <!-- Outlook Email -->
        <div class="col-lg-3 col-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="badge rounded p-2 bg-label-info mb-2"><i class="icon-base ti tabler-report icon-lg"></i></div>
                    <h5 class="card-title mb-1">4.4k</h5>
                    <p class="mb-0">Outlook Email</p>
                </div>
            </div>
        </div>

        <!-- Hotmail -->
        <div class="col-lg-3 col-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="badge rounded p-2 bg-label-warning mb-2"><i class="icon-base ti tabler-report icon-lg"></i></div>
                    <h5 class="card-title mb-1">5.4k</h5>
                    <p class="mb-0">Hotmail</p>
                </div>
            </div>
        </div>

        {{--<div class="col-lg-6 col-md-12">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Stock Available</h5>
                    <small class="text-body-secondary">Total: 300</small>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded bg-label-danger me-4 p-2"><i class="icon-base ti tabler-shopping-cart icon-lg"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">50</h5>
                                    <small>Email</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded bg-label-info me-4 p-2"><i class="icon-base ti tabler-shopping-cart icon-lg"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">100</h5>
                                    <small>Outlook Email</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded bg-label-warning me-4 p-2"><i class="icon-base ti tabler-shopping-cart icon-lg"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">150</h5>
                                    <small>Hotmail</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
