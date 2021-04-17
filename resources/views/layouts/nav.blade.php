
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Wildventory</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item {{ request()->is('pemasok','pemasok/tambah', 'pemasok/update') ? 'active' : '' }}">
                <a class="nav-link" href="/pemasok">
                    <i class="fas fa-user-plus"></i>
                    <span>Pemasok</span></a>
            </li>

            <li class="nav-item {{ request()->is('barang','barang/tambah', 'barang/update') ? 'active' : '' }}">
                <a class="nav-link" href="/barang">
                    <i class="fas fa-briefcase"></i>
                    <span>Inventori</span></a>
            </li>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-handshake"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilihan:</h6>
                        <a class="collapse-item" href="/pembeli">Pembeli</a>
                        <a class="collapse-item" href="/pembayaran">Pembayaran</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Utilitas
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ request()->is('tentang') ? 'active' : '' }}">
                <a class="nav-link" href="tentang">
                    <i class="fas fa-cog"></i>
                    <span>Tentang Aplikasi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <i class="fas fa-user fa-fw"></i>
                                </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                 <button type="submit" class="dropdown-item" data-toggle="modal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                 </button>
                                </form>


                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

