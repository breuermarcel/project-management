<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <h6 class="sidebar-heading px-3 text-muted mt-sm-4">{{ trans('Overall') }}</h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">{{ trans('Dashboard') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">{{ trans('Customers') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('projects.index') }}">{{ trans('Projects') }}</a>
            </li>
        </ul>

        <h6 class="sidebar-heading px-3 text-muted">{{ trans('Settings') }}</h6>
        <ul class="nav flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link" href="#">{{ trans('Profile') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ trans('Logout') }}</a>
            </li>
        </ul>
    </div>
</nav>
