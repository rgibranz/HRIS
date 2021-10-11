 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url('assets/gambar/user/' . $karyawan->img) ?>" class="img-circle elevation-3" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item">
                     <a href="<?= base_url('dasboard_user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dasboard_user') {
                                                                                    echo "active";
                                                                                } ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             DASBOARD
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


                 <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'form') {
                                                        echo "menu-open";
                                                    }
                                                    if ($this->uri->segment(1) == 'list_cuti') {
                                                        echo "menu-open";
                                                    } ?>">
                     <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'form') {
                                                        echo "active";
                                                    } ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Cuti
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('form/list_cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'list_cuti') {
                                                                                                echo "active";
                                                                                            } ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List Cuti</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('form/ajukan_cuti') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'ajukan_cuti') {
                                                                                                echo "active";
                                                                                            } ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Ajukan Cuti</p>
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li class="nav-item has-treeview <?php if ($this->uri->segment(2) == 'detail_biodata') {
                                                        echo "menu-open";
                                                    }
                                                    if ($this->uri->segment(2) == 'edit_biodata') {
                                                        echo "menu-open";
                                                    } ?>">
                     <a href="#" class="nav-link <?php if ($this->uri->segment(2) == 'detail_biodata') {
                                                        echo "active";
                                                    } ?>">
                         <i class="nav-icon ion ion-android-person"></i>
                         <p>
                             Biodata
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('karyawan/detail_biodata/'  . $this->session->userdata('nama_karyawan')) ?>" class="nav-link <?php if ($this->uri->segment(2) == 'detail_biodata') {
                                                                                                                                                    echo "active";
                                                                                                                                                } ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Detail Biodata</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('karyawan/edit_biodata/'  . $this->session->userdata('nama_karyawan')) ?>" class="nav-link <?php if ($this->uri->segment(2) == 'edit_biodata') {
                                                                                                                                                    echo "active";
                                                                                                                                                } ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Edit Biodata</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('auth/logout_user') ?>" class="nav-link " id="log_out">
                         <i class="nav-icon ion ion-log-out" aria-hidden="true"></i>
                         <p>
                             Log out
                         </p>
                     </a>
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

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