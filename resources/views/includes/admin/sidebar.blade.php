  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Peminjaman Ruangan </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard_admin') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('kegiatan.index') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Kegiatan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ruangan.index') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Ruangan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('peminjaman.index') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Peminjaman</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('manage-user.index') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Manage-User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>
<!-- End of Sidebar -->
