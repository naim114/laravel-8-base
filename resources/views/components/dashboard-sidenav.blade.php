<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">{{ trans('app.dashboard') }}</div>
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        {{ trans('app.dashboard') }}
                    </a>

                    {{-- Account --}}
                    <div class="sb-sidenav-menu-heading">{{ trans('app.account') }}</div>

                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        {{ trans('app.profile') }}
                    </a>

                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                        {{ trans('app.activity') }}
                    </a>

                    {{-- Administrations --}}
                    @if (has_permission('users.manage') || has_permission('users.activity') || has_permission('roles.manage') || has_permission('permissions.manage'))
                        <div class="sb-sidenav-menu-heading">{{ trans('app.administration') }}</div>
                    @endif

                    @if (has_permission('users.manage'))
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            {{ trans('app.users') }}
                        </a>
                    @endif

                    @if (has_permission('users.activity'))
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                            {{ trans('app.activity-log') }}
                        </a>
                    @endif

                    @if (has_permission('roles.manage') || has_permission('permissions.manage'))
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                            {{ trans('app.roles-permissions') }}
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @if (has_permission('roles.manage'))
                                    <a class="nav-link" href="layout-static.html">{{ trans('app.roles') }}</a>
                                @endif
                                @if (has_permission('permissions.manage'))
                                    <a class="nav-link"
                                        href="layout-sidenav-light.html">{{ trans('app.permissions') }}</a>
                                @endif
                            </nav>
                        </div>
                    @endif

                    {{-- Settings --}}
                    @if (has_permission('settings.general'))
                        <div class="sb-sidenav-menu-heading">{{ trans('app.settings') }}</div>
                    @endif

                    @if (has_permission('settings.general'))
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            {{ trans('app.general') }}
                        </a>
                    @endif

                    {{-- Examples --}}
                    {{-- Stack --}}
                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div> --}}
                    {{-- Double Stack --}}
                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div> --}}
                    {{-- Examples --}}
                </div>
            </div>
            <div class="sb-sidenav-footer bg-dark">
                <div class="small">Logged in as:</div>
                @yield('user-name')
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('page-title')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        @yield('breadcrumb')
                    </li>
                </ol>
                @yield('content')
            </div>
        </main>
        @include('components.dashboard-footer')
    </div>
</div>
