@extends('layouts.commonMasterFront')

@section('layoutContent')
    <!-- Navbar: Start -->
    @include('layouts.sections.navbar.navbarFront')
    <!-- Navbar: End -->

    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        @yield('content')
    </div>
    <!-- / Sections:End -->

    <!-- Footer: Start -->
    @include('layouts.sections.footer.footerFront')
    <!-- Footer: End -->
@endsection
