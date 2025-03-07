<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #f3a819">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("") ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text">APLIKASI <br> <sup>TRY OUT WINAYA LAKSA</sup></div>   
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && ($this->uri->segment(2) == "dashboard" || $this->uri->segment(2) == "statistik" || $this->uri->segment(2) == "detail_statistik") ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/dashboard") ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "user" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/user") ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "class" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/class") ?>">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "kategori" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/kategori") ?>">
                <i class="fas fa-fw fa-box"></i>
                <span>Kategori</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "pengumuman" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/pengumuman") ?>">
                <i class="fas fa-fw fa-city"></i>
                <span>Pengumuman</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "soal" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/soal") ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Tryout</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "latihan" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/latihan") ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Latihan</span></a>
        </li>
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline ">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

