<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Simple CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                        class="nav-link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ trans('simplecrm.dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">{{ trans('simplecrm.main_menu') }}</li>
                <li class="nav-item">
                    <a href="{{ route('admin.company.index') }}" class="nav-link {{ Request::routeIs('admin.company.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            {{ trans('simplecrm.company.title') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.employee.index') }}" class="nav-link {{ Request::routeIs('admin.employee.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ trans('simplecrm.employee.title') }}
                        </p>
                    </a>
                </li>
                <li class="nav-header text-uppercase">{{ trans('simplecrm.admin_menu') }}</li>
                <li class="nav-item">
                    <a href="{{ route('admin.translation.index') }}" class="nav-link {{ Request::routeIs('admin.translation.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-language"></i>
                        <p>
                            {{ trans('simplecrm.translation.title') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.preference.index') }}" class="nav-link {{ Request::routeIs('admin.preference.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ trans('simplecrm.preference.title') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
