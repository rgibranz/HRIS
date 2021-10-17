  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> Data <?= $title ?></div>
        <div class="card-tools">
          <a href="<?= base_url('karyawan/add') ?>" class="btn btn-primary btn-sm">
            <i class=" fa fa-plus"></i>
            Add
          </a>
        </div>
      </div>

      <div class="card-body">

        <div class="row mb-3">
          <div class="ml-2">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_cuti">Tambah Cuti</button>
          </div>
          <div class="col-2 mr-5">
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#kurangi_cuti">Kurangi Cuti</button>
          </div>
        </div>

        <!--Table-->
        <div class="row row-cols-auto">
          <?php foreach ($data->result() as $key) { ?>
            <div class="col-md-3">
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning">
                  <img src="<?= base_url('assets/gambar/icon/Untitled-1cc.png') ?>" height="75px">
                </div>
                <div class="widget-user-image mt-3">
                  <img class="img-circle elevation-3" src="<?= base_url('assets/gambar/user/' . $key->img) ?>" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Jabatan</h5>
                        <span class="description-text"><?= $key->job ?></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Nama</h5>
                        <span class="description-text"><?= $key->nama_karyawan ?></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <!--
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Divisi</h5>
                        <span class="description-text"><?= $key->nama_divisi ?></span>
                      </div>
                     -->
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          <?php } ?>
        </div>
        <?=
        $pagination;
        ?>
      </div>
      <!--end body cards-->
    </div>
    <!-- end -->

  </div>

  <!-- model Delete-->
  <?php foreach ($all_karyawan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_karyawan ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus <?= $title ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('karyawan/delete'); ?>

            <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?= base_url('karyawan/delete/' . $value->id_karyawan) ?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php } ?>
  <!--End Modal Delete-->

  <!-- model Tambah semua cuti-->
  <div class="modal fade" id="tambah_cuti">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Cuti Semua Karyawan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('karyawan/tambah_cuti_all'); ?>

          <div class="col-sm-3">
            <div class="form-group">
              <label>Jumlah Cuti</label>
              <input type="text" name="tambah_cuti">
            </div>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!--End Modal Tambah semua cuti-->

  <!-- model kurangi semua cuti-->
  <div class="modal fade" id="kurangi_cuti">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Kurangi Semua Cuti Karyawan </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('karyawan/kurangi_cuti_all'); ?>

          <div class="col">
            <div class="form-group">
              <label>Jumlah Cuti</label>
              <input type="text" class="form-control" name="kurangi_cuti">
            </div>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kurangi</button>
        </div>
      </div>
      <?php echo form_close(); ?>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!--End Modal Kurangi semua cuti-->


  <!-- model Tambah cuti-->
  <?php foreach ($karyawan as $key => $value) { ?>
    <div class="modal fade" id="tambah_cuti<?= $value->id_karyawan ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Cuti Semua Karyawan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('karyawan/tambah_cuti'); ?>

            <div class="col">
              <div class="form-group">
                <label>Jumlah Cuti</label>
                <input type="number" class="form-control" name="tambah_cuti">
                <input type="text" class="form-control" name="id_karyawan" value="<?= $value->id_karyawan ?>" hidden>
              </div>
            </div>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php } ?>
  <!--End Modal Tambah cuti-->

  <!-- model kurangi  cuti-->
  <?php foreach ($all_karyawan as $key => $value) { ?>
    <div class="modal fade" id="kurangi_cuti<?= $value->id_karyawan ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">kurangi Cuti</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('karyawan/kurangi_cuti'); ?>

            <div class="col">
              <div class="form-group">
                <label>Jumlah Cuti</label>
                <input type="text" class="from-control" name="kurangi_cuti">
                <input type="text" name="id_karyawan" value="<?= $value->id_karyawan ?>" hidden>
              </div>
            </div>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Kurangi</button>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  <?php } ?>
  <!--End Modal Kurangi cuti-->