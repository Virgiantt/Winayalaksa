<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #f3a819;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("") ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text">Aplikasi <br> <sup>Winayalaksa.id</sup></div>   
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item <?= $this->uri->segment(1) == "user" && $this->uri->segment(2) == "soal" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url("user/soal") ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Soal</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "user" && $this->uri->segment(2) == "latihan" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url("user/latihan") ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Latihan</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "user" && $this->uri->segment(2) == "hasil" ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url("user/hasil") ?>">
                <i class="fas fa-fw fa-check"></i>
                <span>Hasil</span></a>
        </li>
        <div class="text-center d-none d-md-inline ">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

