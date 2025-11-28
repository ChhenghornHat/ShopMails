@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Dashboard')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <h5 class="pb-1 mb-6">Draggable Cards</h5>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-primary"><i class="icon-base ti tabler-currency-dollar icon-28px"></i></span>
                                </div>
                                <h4 class="mb-0">42</h4>
                            </div>
                            <p class="mb-1">Balance</p>
                            <p class="mb-0">
                                <small class="text-body-secondary">Our current balance</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-warning"><i class="icon-base ti tabler-alert-triangle icon-28px"></i></span>
                                </div>
                                <h4 class="mb-0">8</h4>
                            </div>
                            <p class="mb-1">FB Gmail OTP</p>
                            <p class="mb-0">
                                <small class="text-body-secondary">Gmail account for facebook</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-danger h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-danger"><i class="icon-base ti tabler-git-fork icon-28px"></i></span>
                                </div>
                                <h4 class="mb-0">27</h4>
                            </div>
                            <p class="mb-1">FB Outlook OTP</p>
                            <p class="mb-0">
                                <small class="text-body-secondary">Outlook account for facebook</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card card-border-shadow-info h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div class="avatar me-4">
                                    <span class="avatar-initial rounded bg-label-info"><i class="icon-base ti tabler-clock icon-28px"></i></span>
                                </div>
                                <h4 class="mb-0">13</h4>
                            </div>
                            <p class="mb-1">FB Custom OTP</p>
                            <p class="mb-0">
                                <small class="text-body-secondary">Custom account for facebook</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="pb-1 py-6">History & Transaction Purchase</h5>
            <div class="table-responsive border border-bottom-0 border-top-0 rounded">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Mail</th>
                        <th>Service</th>
                        <th>Amount (USD)</th>
                        <th>OTP</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-nowrap text-heading">Pending</td>
                        <td class="text-nowrap">fellingsounds@gmail.com</td>
                        <td>Facebook</td>
                        <td>0.50</td>
                        <td>N/A</td>
                        <td>11-Nov-2025 22:25</td>
                        <td>
                            <button class="btn btn-icon btn-primary"><i class="icon-base ti tabler-refresh icon-22px"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
