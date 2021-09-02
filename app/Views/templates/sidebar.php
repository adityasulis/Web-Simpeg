<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="/img/logo-kop/logo.png" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3">
            DASHBOARD
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('User/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if (in_groups('superadmin')) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            MANAJEMEN AKUN
        </div>

        <!-- Nav Item - Daftar Users -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>User Pegawai</span></a>
        </li>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            MANAJEMEN PEGAWAI
        </div>

        <!-- Nav Item - Daftar Pegawai -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pegawai</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen Kepegawaian :</h6>
                    <a class="collapse-item" href="<?= base_url('DaftarPeg/index'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        Daftar Pegawai
                    </a>
                    <a class="collapse-item" href="<?= base_url('DaftarPeg/create'); ?>">
                        <i class="fas fa-fw fa-user-plus"></i>
                        Tambah Pegawai
                    </a>
                    <a class="collapse-item" href="<?= base_url('ExportExcel/cetak'); ?>">
                        <i class="fas fa-file-excel"></i>
                        Export Excel
                    </a>

                </div>
            </div>
        </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        USER PROFILE
    </div>

    <!-- Akun Saya -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Akun</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Akun :</h6>
                <a class="collapse-item" href="<?= base_url('User/index'); ?>">
                    <i class="fas fa-user"></i> Akun Saya</a>
                <a class="collapse-item" href="#">
                    <i class="fas fa-user-edit"></i> Edit Akun Saya</a>
            </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>