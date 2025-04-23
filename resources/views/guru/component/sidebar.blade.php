<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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
    <li class="nav-item {{ Request::routeIs('guru.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('guru.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item {{ Request::routeIs('guru.lapor') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('guru.lapor')}}">
            <i class="fas fa-fw fa-gavel    "></i>
            <span>Lapor</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::routeIs('guru.laporan') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('guru.laporan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Kelas</span></a>
    </li>

    <li class="nav-item {{ Request::routeIs('guru.riwayat') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('guru.riwayat')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Riwayat Laporan</span></a>
    </li>

    <li class="nav-item {{ Request::routeIs('guru.dilaporkan') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('guru.dilaporkan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Dilaporkan</span></a>
    </li>

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
