<!doctype html>
<html
    lang="en"
    class="layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-skin="default"
    data-assets-path="{{ asset('assets/') . '/' }}"
    data-template="vertical-menu-template"
    data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title') | {{ config('variables.templateName') }}</title>

    <!-- Laravel CRUD Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=""/>

    <!-- Include Styles -->
    @include('layouts.sections.styles')

    <!-- Vendor Styles -->
    @yield('vendor-styles')

    <!-- Page Styles -->
    @yield('page-styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts.sections.scriptsIncludes')
</head>
<body>
<!-- Layout wrapper -->
@yield('layoutContent')
<!-- / Layout wrapper -->

<!-- Core Scripts -->
@include('layouts.sections.scripts')

<!-- Vendors Scripts -->
@yield('vendor-scripts')

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page Scripts -->
<script type="text/javascript">
    // Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Notifications
    @if(Session::has('message'))
        const notyf = new Notyf();
        const status = "{{ Session::get('status', 'info') }}";
        const message = "{{ Session::get('message') }}";

        switch (status) {
            case 'info':
                notyf.info(message);
                break;
            case 'success':
                notyf.success(message);
                break;
            case 'warning':
                notyf.warning(message);
                break;
            case 'error':
                notyf.error(message);
                break;
        }
    @endif
</script>
@yield('page-scripts')

</body>
</html>
