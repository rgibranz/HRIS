  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> List <?= $title ?></div>
        <div class="card-tools">
          <a href="<?= base_url('HR/Divisi/add_users/' . $id_divisi) ?>" class="btn btn-primary btn-sm">
            <i class=" fa fa-plus"></i>
            Add
          </a>
        </div>
      </div>
      <div class="card-body">

        <!--Table-->
        <table class="table table-bordered text-center" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>divisi</th>
              <th>Posisi</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($divisi_users as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_users ?></td>
                <td><?= $value->nama_divisi ?></td>
                <td><?= $value->job ?></td>
                <td>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_users ?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

    <?php foreach ($divisi_users as $key => $value) { ?>
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
              <?php echo form_open('users/delete'); ?>

              <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('HR/Divisi/delete_users/' . $value->id_users) ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php } ?>

  </div>