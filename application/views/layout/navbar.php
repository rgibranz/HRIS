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
                        <a href="<?= base_url('HR/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('HR/absen') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'absen') {
                                                                                    echo "active";
                                                                                } ?>">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                List Absen
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('HR/divisi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'divisi') {
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
                        <a href="<?= base_url('HR/Karyawan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'karyawan') {
                                                                                        echo "active";
                                                                                    } ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Karyawan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= base_url('HR/cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
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
    if ($this->session->userdata('level_user') == 'direktur') { ?>
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
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('absen') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'absen') {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('form/list_cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            list cuti
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
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('absen') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'absen') {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('form/list_cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            list cuti
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
    <!-- /.sidebar manajer-->
    </aside>

<?php }
    if ($this->session->userdata('level_user') == 'karyawan') { ?>

    <!-- Sidebar direktur -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Dashboard') {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('absen') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'absen') {
                                                                            echo "active";
                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('form/list_cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti_admin') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            list cuti
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