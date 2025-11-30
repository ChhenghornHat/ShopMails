@extends('layouts.commonMasterFront')

@section('title', 'Verify Email')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}"/>
@endsection

@section('layoutContent')
    <div class="authentication-wrapper authentication-basic px-6">
        <div class="authentication-inner py-6">
            <!-- Verify Email -->
            <div class="card">
                <form method="post" action="{{ route('verification.send') }}" class="card-body">
                    @csrf
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="{{ route('home') }}" class="app-brand-link">
                            <span class="app-brand-logo demo">

                            </span>
                            <span class="app-brand-text demo text-heading fw-bold">{{ config('variables.templateName') }}</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Verify your email ✉️</h4>
                    <p class="text-start mb-0">Account activation link sent to your email address: <span class="fw-medium">{{ Auth::user()->email }}</span> Please follow the link inside to continue.</p>
                    <p class="text-center my-6">
                        Didn't get the mail?
                    </p>
                    @if($errors->any())
                        <div class="alert alert-info">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary w-100 mb-0"> Resend Verification Email </button>
                </form>
            </div>
            <!-- /Verify Email -->
        </div>
    </div>
@endsection
