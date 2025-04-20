<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon">
            <img src="{{asset('assets/img/smada.ico')}}" alt="" srcset="">
        </div>
        <div class="sidebar-brand-text mx-3">SI APEM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Charts -->
    @if (Auth::user()->role == 'superadmin')
    <li class="nav-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.users')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Users</span></a>
    </li>
    @endif

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::routeIs('admin.laporan') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.laporan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Nav Item - Tables -->


    @if (Auth::user()->role == 'superadmin')
    <li class="nav-item {{ Request::routeIs('admin.kategori') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.kategori')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Kategori</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
