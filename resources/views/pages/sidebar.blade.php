<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/download.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">RPJP BJM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill me-2"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->routeIs('users.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-header">TABLE</li>

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Infrastruktur dan Kewilayahan'))
                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}"
                            class="nav-link {{ request()->routeIs('projects.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Projects
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Infrastruktur dan Kewilayahan'))
                    <li class="nav-item">
                        <a href="{{ route('managers.index') }}"
                            class="nav-link {{ request()->routeIs('managers.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Project Manager
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Geospasial'))
                    <li class="nav-item">
                        <a href="{{ route('locations.index') }}"
                            class="nav-link {{ request()->routeIs('locations.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Project Location
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Ekonomi'))
                    <li class="nav-item">
                        <a href="{{ route('sources.index') }}"
                            class="nav-link {{ request()->routeIs('sources.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Source Funds
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Ekonomi'))
                    <li class="nav-item">
                        <a href="{{ route('budgets.index') }}"
                            class="nav-link {{ request()->routeIs('budgets.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Budget
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Infrastruktur dan Kewilayahan'))
                    <li class="nav-item">
                        <a href="{{ route('dates.index') }}"
                            class="nav-link {{ request()->routeIs('dates.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Project Date
                            </p>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Bidang Infrastruktur dan Kewilayahan'))
                    <li class="nav-item">
                        <a href="{{ route('publications.index') }}"
                            class="nav-link {{ request()->routeIs('publications.index') ?: '' }}">
                            <i class="bi bi-list-ul me-2"></i>
                            <p>
                                Project Publications
                            </p>
                        </a>
                    </li>
                @endif



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
