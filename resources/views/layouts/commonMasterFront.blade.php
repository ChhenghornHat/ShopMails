<!doctype html>
<html
    lang="en"
    class=" layout-navbar-fixed layout-wide"
    dir="ltr" data-skin="default" data-bs-theme="light"
    data-assets-path="{{ asset('assets') . '/' }}"
    data-template="front-pages">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="robots" content="noindex, nofollow"/>
    <title>@yield('title') | {{ config('variables.templateName') }}</title>

    <meta name="description" content=""/>
    <!-- Canonical SEO -->
    <meta name="keywords" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content="product"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:site_name" content="ShopMails"/>
    <link rel="canonical" href=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

    <!-- Include Styles -->
    @include('layouts.sections.stylesFront')

    <!-- Vendor Styles -->
    @yield('vendor-styles')

    <!-- Page CSS -->
    @yield('page-styles')

    <!-- Include Scripts for customize, helper, analytics, config  -->
    @include('layouts.sections.scriptsIncludesFront')
</head>
<body>
@yield('layoutContent')

<!-- Include Scripts -->
@include('layouts.sections.scriptsFront')

<!-- Main JS -->
<script src="{{ asset('assets/js/front-main.js') }}"></script>

<!-- Vendors Scripts -->
@yield('vendor-scripts')

<!-- Page Scripts -->
@yield('page-scripts')
</body>
</html>
