@extends('layouts.contentNavbarLayout')

@section('title', 'Edit Stock')

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
    <form id="formStock" action="{{ route('mail.stock.update', $stock->id) }}" method="post" autocomplete="off">
        @csrf
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Edit Stock</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <a href="{{ route('mail.stock') }}" class="btn btn-label-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="mail">Mail</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mail" name="mail" value="{{ $stock->mail }}" placeholder="Enter Mail" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" value="{{ $stock->password }}" placeholder="Enter Password / App Password" />
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="flatform">Flatform</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="flatform" name="flatform">
                            <option value="">Select Flatform</option>
                            <option value="Facebook" {{ $stock->flatform === 'Facebook' ? 'selected' : '' }}>Facebook</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="smtp">SMTP</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="smtp" name="smtp">
                            <option value="">Select SMTP</option>
                            <option value="Gmail" {{ $stock->smtp === 'Gmail' ? 'selected' : '' }}>Gmail</option>
                            <option value="Outlook" {{ $stock->smtp === 'Outlook' ? 'selected' : '' }}>Outlook</option>
                            <option value="Custom" {{ $stock->smtp === 'Custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
