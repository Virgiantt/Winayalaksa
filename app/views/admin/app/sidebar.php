<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #f3a819">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("") ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <!--<div class="sidebar-brand-text">WINALAYAKSA <br> <sup>Future is in Your Hand</sup></div>  -->
            <div class="sidebar-brand-text">TIRTA MAHAMERU <br> <sup>Future is in Your Hand</sup></div>  
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("main_page") ?>">
                <i class="fas fa-fw fa-arrow-left"></i>
                <span>Main Page</span></a>
        </li>
        <li class="nav-item <?= in_array($this->uri->segment(2), ["dashboard", "statistik", "detail_statistik", "class", "kategori", "soal", "latihan"]) ? "active bg-orange" : "" ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTryout" aria-expanded="false" aria-controls="collapseTryout">
                <i class="fas fa-fw fa-list"></i>
                <span>APP 1</span>
            </a>
            <div id="collapseTryout" class="collapse <?= in_array($this->uri->segment(2), ["dashboard", "statistik", "detail_statistik", "class", "kategori", "soal", "latihan"]) ? "show" : "" ?>" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= in_array($this->uri->segment(2), ["dashboard", "statistik", "detail_statistik"]) ? "active bg-orange" : "" ?>" href="<?= base_url("admin/dashboard") ?>">
                        <i class="fas fa-fw fa-book"></i> Dashboard
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "class" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/class") ?>">
                        <i class="fas fa-fw fa-calendar"></i> Kelas
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "kategori" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/kategori") ?>">
                        <i class="fas fa-fw fa-box"></i> Kategori
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "soal" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/soal") ?>">
                        <i class="fas fa-fw fa-list"></i> Tryout
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "latihan" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/latihan") ?>">
                        <i class="fas fa-fw fa-list"></i> Latihan
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item <?= in_array($this->uri->segment(2), ["learnmain", "grafiklearn", "detail_grafiklearn", "learnclass", "modul","lesson", "matery", "discuss","quiz"]) ? "active bg-orange" : "" ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTryout" aria-expanded="false" aria-controls="collapseTryout">
                <i class="fas fa-fw fa-list"></i>
                <span>APP 2</span>
            </a>
            <div id="collapseTryout" class="collapse <?= in_array($this->uri->segment(2), ["learnmain", "grafiklearn", "detail_grafiklearn", "learnclass", "modul","lesson", "matery", "discuss","quiz"]) ? "show" : "" ?>" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= in_array($this->uri->segment(2), ["learnmain", "grafiklearn", "detail_grafiklearn"]) ? "active bg-orange" : "" ?>" href="<?= base_url("admin/learnmain") ?>">
                        <i class="fas fa-fw fa-book"></i> Dashboard
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "learnclass" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/learnclass") ?>">
                        <i class="fas fa-fw fa-users"></i> Kelas
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "lesson" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/lesson") ?>">
                        <i class="fas fa-fw fa-user-cog"></i> Pelatihan
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "modul" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/modul") ?>">
                        <i class="fas fa-fw fa-folder-open"></i> Modul
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "matery" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/matery") ?>">
                        <i class="fas fa-fw fa-file-alt"></i> Materi
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "discuss" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/discuss") ?>">
                        <i class="fas fa-fw fa-file-signature"></i> Pembahasan
                    </a>
                    <a class="collapse-item <?= $this->uri->segment(2) == "quiz" ? "active bg-orange" : "" ?>" href="<?= base_url("admin/quiz") ?>">
                        <i class="fas fa-fw fa-file-archive"></i> Soal
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "pengumuman" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/pengumuman") ?>">
                <i class="fas fa-fw fa-city"></i>
                <span>Pengumuman</span></a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "user" ? "active bg-orange" : "" ?>">
            <a class="nav-link" href="<?= base_url("admin/user") ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span></a>
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

