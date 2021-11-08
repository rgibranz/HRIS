<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>assets/gambar/icon/Untitled-1cc.png" alt="Logo" width="200" style="opacity: .8">
    </a>

    <?php
    if ($this->session->userdata('level_user') == 'HR') { ?>
        <!--HR-->
        <!-- Sidebar HR -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="<?= base_url('hr/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('hr/divisi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'divisi') {
                                                                                    echo "active";
                                                                                }
                                                                                if ($this->uri->segment(1) == 'divisi_karyawan') {
                                                                                    echo "actives";
                                                                                } ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Divisi
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('hr/karyawan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Karyawan') {
                                                                                        echo "active";
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Karyawan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('hr/cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                            <i class="nav-icon fas fa-clone"></i>
                            <p>
                                list cuti
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('auth/logout_user') ?>" class="nav-link" id="log_out">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar admin-->
</aside>


<!--END HR-->

<?php }
    if ($this->session->userdata('level_user') == 'Direktur') { ?>
    <!-- Direktur-->

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                                            with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('direktur/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('direktur/cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            List cuti
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout_user') ?>" class="nav-link" id="log_out">
                        <i class="nav-icon fas fa-sign"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar direktur-->
    </aside>

    <!--END Dirktur-->
<?php }
    if ($this->session->userdata('level_user') == 'Manajer') { ?>
    <!-- Sidebar Manajer -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                                                with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('manajer/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= base_url('manajer/cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            List cuti
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('manajer/cuti/ajukan_cuti') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'ajukan_cuti') {
                                                                                                echo "active";
                                                                                            } ?>"> <i class="nav-icon fas fa-marker"></i>
                        <p>Ajukan Cuti</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout_user') ?>" class="nav-link" id="log_out">
                        <i class="nav-icon fas fa-sign"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar manajer-->
    </aside>

<?php }
    if ($this->session->userdata('level_user') == 'Karyawan') { ?>

    <!-- Sidebar karyawan -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('karyawan/dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == 'Biodata' || $this->uri->segment(3) == 'edit_biodata') {
                                                        echo "menu-open";
                                                    } ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Biodata
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('karyawan/biodata/') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Biodata' && $this->uri->segment(3) == '') {
                                                                                                echo "active";
                                                                                            } ?>"> <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Biodata</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('karyawan/biodata/edit_biodata') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'edit_biodata') {
                                                                                                            echo "active";
                                                                                                        } ?>"> <i class="far fa-circle nav-icon"></i>
                                <p>Edit Biodata</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview <?php if ($this->uri->segment(3) == 'list_cuti' || $this->uri->segment(3) == 'ajukan_cuti') {
                                                        echo 'menu-open';
                                                    } ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-marker"></i>
                        <p>
                            Cuti
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('karyawan/cuti/list_cuti') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'list_cuti') {
                                                                                                        echo "active";
                                                                                                    } ?>"> <i class="far fa-circle nav-icon"></i>
                                <p>List Cuti</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('karyawan/cuti/ajukan_cuti') ?>" class="nav-link <?php if ($this->uri->segment(3) == 'ajukan_cuti') {
                                                                                                        echo "active";
                                                                                                    } ?>"> <i class="far fa-circle nav-icon"></i>
                                <p>Ajukan Cuti</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('auth/logout_user') ?>" class="nav-link" id="log_out">
                        <i class="nav-icon fas fa-sign"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>

            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar Karyawan-->
    </aside>
<?php } ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">