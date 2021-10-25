  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> <?= $title ?></div>
        <div class="card-tools">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
            <i class=" fa fa-plus"></i>
            Add
          </button>
        </div>
      </div>

      <div class="card-body">
        <table class="table table-bordered text-center" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Divisi</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($divisi as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_divisi ?></td>
                <td>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_divisi ?>"><i class="fa fa-edit"></i></button>
                  <a href="<?= base_url('hr/divisi/users/' . $value->id_divisi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_divisi ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

    <!-- model add-->
    <div class="modal fade" id="add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah <?= $title ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('hr/divisi/add'); ?>
            <div class="form-group">
              <label>Nama Divisi</label>
              <input type="text" class="form-control" name="nama_divisi" placeholder="Nama divisi">
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- model edit-->
    <?php foreach ($divisi as $key => $value) { ?>

      <div class="modal fade" id="edit<?= $value->id_divisi ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">edit <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('hr/divisi/edit/' . $value->id_divisi); ?>

              <div class="form-group">
                <label>Nama Divisi</label>
                <input type="text" class="form-control" name="nama_divisi" value="<?= $value->nama_divisi ?>" placeholder="Nama divisi">
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php } ?>
    <!-- /.modal -->

    <!-- model Delete-->
    <?php foreach ($divisi as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value->id_divisi ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus <?= $title ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('hr/divisi/delete'); ?>

              <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('hr/divisi/delete/' . $value->id_divisi) ?>" class="btn btn-danger">Delete</a>
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

  </div>