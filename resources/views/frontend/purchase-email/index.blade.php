@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Purchase Email')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <h5 class="pb-1 mb-6">Purchase Email</h5>
            <div class="row g-6 mb-6">
                <div class="col-lg-4 col-sm-6">
                    <form action="{{ route('purchase.store') }}" class="card h-100" method="post">
                        @csrf
                        <input type="hidden" name="smtp_type" value="gmail">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h5 class="mb-1 me-2">{{ $gmailCount }}</h5>
                                <p class="mb-0">FB Gmail OTP</p>
                            </div>
                            <div class="card-icon">
                            <button type="submit" class="badge bg-label-primary rounded p-2">
                                <i class="icon-base ti tabler-plus icon-26px"></i>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h5 class="mb-1 me-2">{{ $outlookCount }}</h5>
                                <p class="mb-0">FB Outlook OTP</p>
                            </div>
                            <div class="card-icon">
                            <button type="button" class="badge bg-label-primary rounded p-2">
                                <i class="icon-base ti tabler-plus icon-26px"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="card-title mb-0">
                                <h5 class="mb-1 me-2">{{ $customCount }}</h5>
                                <p class="mb-0">FB Custom OTP</p>
                            </div>
                            <div class="card-icon">
                            <button type="button" class="badge bg-label-primary rounded p-2">
                                <i class="icon-base ti tabler-plus icon-26px"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">History & Transaction Purchase</h5>
                    <h5 class="card-title m-0 me-2">Total orders: 1</h5>
                </div>
                <div class="card-body">
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
            </div>
        </div>
    </section>
@endsection
