  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> Data <?= $title ?></div>
        <div class="card-tools">
          <a href="<?= base_url('hr/karyawan/add') ?>" class="btn btn-primary btn-sm">
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


        <table class="table table-bordered text-center" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>divisi</th>
              <th>Job</th>
              <th>sisa cuti</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($all_users as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_users ?></td>
                <td><?= $value->email ?></td>
                <td><?= $value->nama_divisi ?></td>
                <td><?= $value->job ?></td>
                <td><?= $value->sisa_cuti ?></td>
                <td>
                  <a href="<?= base_url('hr/karyawan/edit/' . $value->id_users) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_cuti<?= $value->id_users ?>">Tambah cuti</button>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#kurangi_cuti<?= $value->id_users ?>">Kurangi Cuti</button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_users ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

    <!-- model Delete-->
    <?php foreach ($all_users as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value->id_users ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('hr/karyawan/delete/' . $value->id_users) ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
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
            <h4 class="modal-title">Tambah Cuti Semua users</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('hr/karyawan/tambah_cuti_all'); ?>

            <div class="col">
              <div class="form-group">
                <label>Jumlah Cuti</label>
                <input type="text" class="form-control" name="tambah_cuti">
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
            <h4 class="modal-title">Kurangi Semua Cuti users </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('hr/karyawan/kurangi_cuti_all'); ?>

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
    <?php foreach ($all_users as $key => $value) { ?>
      <div class="modal fade" id="tambah_cuti<?= $value->id_users ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Cuti Semua users</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('hr/karyawan/tambah_cuti'); ?>

              <div class="col">
                <div class="form-group">
                  <label>Jumlah Cuti</label>
                  <input type="number" class="form-control" name="tambah_cuti">
                  <input type="text" class="form-control" name="id_users" value="<?= $value->id_users ?>" hidden>
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
    <?php foreach ($all_users as $key => $value) { ?>
      <div class="modal fade" id="kurangi_cuti<?= $value->id_users ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">kurangi Cuti</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('hr/karyawan/kurangi_cuti'); ?>

              <div class="col">
                <div class="form-group">
                  <label>Jumlah Cuti</label>
                  <input type="text" class="form-control" name="kurangi_cuti">
                  <input type="text" name="id_users" value="<?= $value->id_users ?>" hidden>
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

  </div>