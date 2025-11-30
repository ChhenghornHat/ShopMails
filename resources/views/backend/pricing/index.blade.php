@extends('layouts.contentNavbarLayout')

@section('title', 'Pricing')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/js/pages-custom-smtp.js') }}"></script>
@endsection

@section('content')
    <form id="formPricing" action="{{ $pricing ? route('pricing.update', $pricing->id) : route('pricing.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Pricing</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <button type="reset" class="btn btn-label-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="gmail_price">Gmail Price <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="gmail_price" name="gmail_price" value="{{ $pricing->gmail_price ?? '' }}" placeholder="Enter Gmail Price" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="outlook_price">Outlook Price <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="outlook_price" name="outlook_price" value="{{ $pricing->outlook_price ?? '' }}" placeholder="Enter Outlook Price" />
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="custom_price">Custom Price <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="custom_price" name="custom_price" value="{{ $pricing->custom_price ?? '' }}" placeholder="Enter Custom Price" />
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
