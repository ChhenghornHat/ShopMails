@extends('layouts.contentNavbarLayout')

@section('title', 'Create Stock')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/js/pages-stock.js') }}"></script>
@endsection

@section('content')
    <form id="formStock" action="{{ route('mail.stock.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Add a new Stock</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <a href="{{ route('mail.stock') }}" class="btn btn-label-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="mail">Mail <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Enter Mail" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password / App Password" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="flatform">Flatform <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-select" id="flatform" name="flatform">
                            <option value="">Select Flatform</option>
                            <option value="Facebook" selected>Facebook</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="smtp">SMTP <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-select" id="smtp" name="smtp">
                            <option value="">Select SMTP</option>
                            <option value="Gmail">Gmail</option>
                            <option value="Outlook">Outlook</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
