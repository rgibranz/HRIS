<?php
if ($this->session->userdata('level_user') == 'Direktur') { ?>


  <body class="hold-transition sidebar-mini">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-danger navbar-badge" id="count_direktur"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div id="show_data"></div>
            </div>

          </li>

          <div class="user-panel d-flex">
            <div class="image">
              <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
            </div>
          </div>
        </ul>
      </nav>
      <script>
        $(document).ready(function() {
          setInterval(function() {

            $.ajax({
              url: "<?= base_url() ?>notif/direktur_notif",
              type: "POST",
              datatype: "json",
              success: function(data) {
                if (data != 0) {
                  $('#count_direktur').html(data);
                }
              }
            })

          }, 1000)

        });

        $(document).ready(function() {
          jQuery.ajax({
            url: "<?= base_url() ?>notif/direkturv_notif",
            type: "GET",
            dataType: "json",
            success: function(data) {
              var html = '';
              var i;
              if (data == 0) {
                html += '<a href="#" class="dropdown-item">' +
                  '<div class="media">' +
                  '<div class="media-body">' +
                  '<h3 class="dropdown-item-title">' +
                  '</h3>' +
                  '<p class="text-sm">Tidak Ada Pengajuan cuti</p>' +
                  '</div>' +
                  '</div>' +
                  '</i>' +
                  '<div class="dropdown-divider">' +
                  '</div>';
              } else {
                for (i = 0; i < data.length; i++) {

                  html += '<a href="<?= base_url() ?>direktur/cuti/view_cuti/' + data[i].id_cuti + '" class="dropdown-item">' +
                    '<div class="media">' +
                    '<img src="<?= base_url() ?>assets/gambar/user/' + data[i].img + ' " class="img-size-50 img-circle mr-3">' +
                    '<div class="media-body">' +
                    '<h3 class="dropdown-item-title">' +
                    '<p>' + data[i].nama_users + '<p>' +
                    '</h3>' +
                    '<p class="text-sm">Mengajukan Cuti</p>' +
                    '</div>' +
                    '</div>' +
                    '</i>' +
                    '<div class="dropdown-divider">' +
                    '</div>';

                }
              }
              $('#show_data').html(html);
            }
          })
        });
      </script>
    <?php }
  if ($this->session->userdata('level_user') == 'Manajer') {
    ?>


      <body class="hold-transition sidebar-mini">
        <div class="wrapper">

          <!-- Navbar -->
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>

            </ul>
            <ul class="navbar-nav ml-auto">

              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                  <i class="far fa-bell"></i>
                  <span class="badge badge-danger navbar-badge" id="count_manajer"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                  <!-- Message Start -->
                  <div id="show_data">

                  </div>

                  <!-- Message End -->
                </div>
              </li>

              <div class="user-panel d-flex">
                <div class="image">
                  <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" class="img-circle elevation-2" img alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
                </div>
              </div>
            </ul>
          </nav>
          <script>
            $(document).ready(function() {
              setInterval(function() {

                $.ajax({
                  url: "<?= base_url() ?>notif/manajer_notif",
                  type: "POST",
                  dataType: "json",
                  success: function(data) {
                    if (data != 0) {
                      $('#count_manajer').html(data);
                    }
                  }
                })

              }, 1000)

            });

            $(document).ready(function() {
              jQuery.ajax({
                url: "<?= base_url() ?>notif/manajerv_notif",
                type: "GET",
                dataType: "json",
                success: function(data) {
                  var html = '';
                  var i;
                  if (data == 0) {
                    html += '<a href="#" class="dropdown-item">' +
                      '<div class="media">' +
                      '<div class="media-body">' +
                      '<h3 class="dropdown-item-title">' +
                      '</h3>' +
                      '<p class="text-sm">Tidak Ada Pengajuan cuti</p>' +
                      '</div>' +
                      '</div>' +
                      '</i>' +
                      '<div class="dropdown-divider">' +
                      '</div>';
                  } else {
                    for (i = 0; i < data.length; i++) {
                      html += '<a href="<?= base_url() ?>manajer/cuti/view_cuti/' + data[i].id_cuti + '" class="dropdown-item">' +
                        '<div class="media">' +
                        '<img src="<?= base_url() ?>assets/gambar/user/' + data[i].img + ' " class="img-size-50 img-circle mr-3">' +
                        '<div class="media-body">' +
                        '<h3 class="dropdown-item-title">' +
                        '<p>' + data[i].nama_users + '<p>' +
                        '</h3>' +
                        '<p class="text-sm">Mengajukan Cuti</p>' +
                        '</div>' +
                        '</div>' +
                        '</i>' +
                        '<div class="dropdown-divider">' +
                        '</div>';
                    }
                  }
                  $('#show_data').html(html);
                }
              })
            });
          </script>

        <?php }

      if ($this->session->userdata('level_user') == 'Karyawan') {
        ?>


          <body class="hold-transition sidebar-mini">
            <div class="wrapper">

              <!-- Navbar -->
              <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                  </li>

                </ul>
                <ul class="navbar-nav ml-auto">

                  <div class="user-panel d-flex">
                    <div class="image">
                      <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
                    </div>
                  </div>
                </ul>
              </nav>

            <?php }
          if ($this->session->userdata('level_user') == 'HR') {
            ?>

              <body class="hold-transition sidebar-mini">
                <div class="wrapper">

                  <!-- Navbar -->
                  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                      </li>

                    </ul>
                    <ul class="navbar-nav ml-auto">

                      <div class="user-panel d-flex">
                        <div class="image">
                          <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                          <a href="#" class="d-block"><?php echo $this->session->userdata('nama_karyawan') ?></a>
                        </div>
                      </div>
                    </ul>
                  </nav>

                <?php } ?>









                <!--/.navbar -->