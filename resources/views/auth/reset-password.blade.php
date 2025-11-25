@extends('layouts.commonMasterFront')

@section('title', 'Reset Password')

@section('vendor-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}"/>
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}"/>
@endsection

@section('vendor-scripts')
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
@endsection

@section('layoutContent')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Reset Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <a href="{{ route('home') }}" class="app-brand-link">
                                <span class="app-brand-logo demo">

                                </span>
                                <span class="app-brand-text demo text-heading fw-bold">{{ config('variables.templateName') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1">Reset Password 🔒</h4>
                        <p class="mb-6"><span class="fw-medium">Your new password must be different from previously used passwords</span></p>
                        <form id="formAuthentication" action="{{ route('password.store') }}" method="post">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Enter your email"/>
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('email') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation">
                                <label class="form-label" for="password">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                            </div>
                            <div class="mb-6 form-password-toggle form-control-validation">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group--pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100 mb-6">Set new password</button>
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="d-flex justify-content-center">
                                    <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i>
                                    Back to login
                                </a>text cursor
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Reset Password -->
            </div>
        </div>
    </div>
@endsection

