@extends('layouts.contentNavbarLayout')

@section('title', 'Gmail SMTP')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/js/pages-gmail-smtp.js') }}"></script>
@endsection

@section('content')
    <form method="post" action="{{ $gmailSmtp ? route('gmail.update', $gmailSmtp->id) : route('gmail.store') }}" autocomplete="off">
        @csrf
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Gmail SMTP</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <button type="reset" class="btn btn-label-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="host">Host <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="host" name="host" value="{{ $gmailSmtp->host ?? '' }}" placeholder="Enter Host" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="port">Port <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="port" name="port" value="{{ $gmailSmtp->port ?? '' }}" placeholder="Enter Port" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="encryption">Encryption <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-select" id="encryption" name="encryption">
                            <option value="" disabled>Select Encryption</option>
                            <option value="ssl" {{ $gmailSmtp?->encryption === 'ssl' ? 'selected' : ''}}>SSL</option>
                            <option value="tls" {{ $gmailSmtp?->encryption === 'tls' ? 'selected' : ''}}>TLS</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" value="{{ $gmailSmtp->price ?? '' }}" placeholder="Enter Price" />
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
