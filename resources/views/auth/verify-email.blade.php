{{--
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
--}}

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
                    <button type="submit" class="btn btn-primary w-100 mb-0"> Resend Verification Email </button>
                </form>
            </div>
            <!-- /Verify Email -->
        </div>
    </div>
@endsection
