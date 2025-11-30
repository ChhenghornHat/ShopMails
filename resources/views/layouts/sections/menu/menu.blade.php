@php
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-3">{{ config('variables.templateName') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
            <i class="icon-base ti tabler-x d-block d-xl-none"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Str::contains($currentRouteName, 'admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Manage Public Page -->
        <li class="menu-item {{ Str::startsWith($currentRouteName, 'page') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-browser-check"></i>
                <div data-i18n="Manage Public Page">Manage Public Page</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Home Page">Home Page</div>
                    </a>
                </li>
                <li class="menu-item {{ Str::contains($currentRouteName, 'pricing') ? 'active' : '' }}">
                    <a href="{{ route('page.pricing') }}" class="menu-link">
                        <div data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Manage Stock (Mail) -->
        <li class="menu-item {{ Str::startsWith($currentRouteName, 'mail') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-mail"></i>
                <div data-i18n="Manage Stock (Mail)">Manage Stock (Mail)</div>
            </a>
            <ul class="menu-sub">
                <!-- Stock -->
                <li class="menu-item {{ Str::contains($currentRouteName, 'stock') ? 'active' : '' }}">
                    <a href="{{ route('mail.stock') }}" class="menu-link">
                        <div data-i18n="Stock">Stock</div>
                    </a>
                </li>
                <!-- SMTP Server -->
                <li class="menu-item {{ Str::startsWith($currentRouteName, 'mail.smtp') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="SMTP Server">SMTP Server</div>
                    </a>
                    <ul class="menu-sub">
                        <!-- Gmail -->
                        <li class="menu-item {{ Str::contains($currentRouteName, 'gmail') ? 'active' : '' }}">
                            <a href="{{ route('mail.smtp.gmail') }}" class="menu-link">
                                <div data-i18n="Gmail">Gmail</div>
                            </a>
                        </li>
                        <!-- Outlook -->
                        <li class="menu-item {{ Str::contains($currentRouteName, 'outlook') ? 'active' : '' }}">
                            <a href="{{ route('mail.smtp.outlook') }}" class="menu-link">
                                <div data-i18n="Outlook">Outlook</div>
                            </a>
                        </li>
                        <!-- Custom -->
                        <li class="menu-item {{ Str::contains($currentRouteName, 'custom') ? 'active' : '' }}">
                            <a href="{{ route('mail.smtp.custom') }}" class="menu-link">
                                <div data-i18n="Custom">Custom</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Manage Orders -->
        <li class="menu-item {{ Str::contains($currentRouteName, 'orders') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-shopping-cart"></i>
                <div data-i18n="Manage Orders">Manage Orders</div>
            </a>
        </li>

        <!-- Manage Deposit -->
        <li class="menu-item {{ Str::contains($currentRouteName, 'deposits') ? 'active' : '' }}">
            <a href="{{ route('deposits') }}" class="menu-link">
                <i class="menu-icon icon-base ti tabler-currency-dollar"></i>
                <div data-i18n="Manage Deposit">Manage Deposit</div>
            </a>
        </li>

        <!-- Manage Users -->
        <li class="menu-item {{ Str::startsWith($currentRouteName, 'users') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ti tabler-user-cog"></i>
                <div data-i18n="Manage Users">Manage Users</div>
            </a>
            <ul class="menu-sub">
                <!-- User Register -->
                <li class="menu-item {{ Str::contains($currentRouteName, 'users.register') ? 'active' : '' }}">
                    <a href="{{ route('users.register') }}" class="menu-link">
                        <div data-i18n="User Register">User Register</div>
                    </a>
                </li>
                <!-- User Admin -->
                <li class="menu-item {{ Str::contains($currentRouteName, 'users.admin') ? 'active' : '' }}">
                    <a href="{{ route('users.admin') }}" class="menu-link">
                        <div data-i18n="User Admin">User Admin</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
        <i class="ti tabler-menu icon-base"></i>
        <i class="ti tabler-chevron-right icon-base"></i>
    </a>
</div>
