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
        <a class="nav-link" href="{{ route('dasboard_user') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('list-ruangan') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Ruangan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('data_peminjaman_ruangan') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Peminjaman</span></a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>
<!-- End of Sidebar -->
