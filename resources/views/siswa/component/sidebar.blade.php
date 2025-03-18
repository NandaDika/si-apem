<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">SI APEM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('siswa.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('siswa.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Request::routeIs('siswa.lapor') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('siswa.lapor')}}">
            <i class="fas fa-fw fa-gavel    "></i>
            <span>Lapor</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::routeIs('siswa.riwayat') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('siswa.riwayat')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengajuan</span></a>
    </li>

    <li class="nav-item {{ Request::routeIs('siswa.dilaporkan') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('siswa.dilaporkan')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
