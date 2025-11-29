@extends('layouts.contentNavbarLayout')

@section('title', 'Create Deposit')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-scripts')
{{--    <script src="{{ asset('assets/js/pages-gmail-smtp.js') }}"></script>--}}
@endsection

@section('content')
    <form id="formGmail" action="{{ route('deposits.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Create Deposit</h4>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <a href="{{ route('deposits') }}" class="btn btn-label-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="user_id">User <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="text" class="form-control" value="{{ $user->name }}" disabled/>
                    </div>
                </div>
                <div class="row mb-6">
                    <label class="col-sm-2 col-form-label" for="amount">Amount <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" />
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="notes">Notes</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="notes" name="notes" cols="3" placeholder="Enter Notes"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
