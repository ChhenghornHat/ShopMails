@extends('layouts.contentNavbarLayoutFront')

@section('title', 'Api')

@section('page-scripts')
    {{--    <script src="{{ asset('assets/js/front-page-landing.js') }}"></script>--}}
@endsection

@section('content')
    <section class="section-py bg-body first-section-pt">
        <div class="container">
            <!-- Dashboard -->
            <h5 class="pb-1 mb-6">Your API Token:</h5>
            @if(session('api_token'))
                <div style="padding: 10px; background: #f0f0f0; border: 1px solid #ccc;">
                    {{ session('api_token') }}
                </div>
            @endif
        </div>
    </section>
@endsection
