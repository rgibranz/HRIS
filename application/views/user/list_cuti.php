  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> List <?= $title ?></div>

      </div>

      <div class="card-body">

        <!--Table-->
        <table class="table table-bordered text-center" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Cuti</th>
              <th>Tanggal Pengajuan</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($list_cuti as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->jenis_cuti; ?></td>
                <td><?= $value->tgl_pengajuan; ?></td>
                <td>
                  <?php if ($value->status == "accept") { ?>
                <p class="text-success"><?= $value->status; ?></p>
              <?php }
                  if ($value->status == "reject") { ?>
                <p class="text-danger"><?= $value->status; ?></p>
              <?php }
                  if ($value->status == "diajukan") { ?>
                <p class="text-warning"><?= $value->status; ?></p>
              <?php  } ?>
              </td>
              <td>
                <?php if ($value->status != "diajukan") { ?>
                   <a href="<?= base_url('form/view_cuti_user/' . $value->id_cuti) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <?php } else { ?>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_cuti ?>"><i class="fa fa-trash"></i></button>
                <?php } ?>
              </td>



              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

    <!-- model Delete-->
    <?php foreach ($list_cuti as $key => $value) {?>
        <div class="modal fade" id="delete<?=$value->id_cuti?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus <?= $title ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('form/delete'); ?>

            <h5>Apakah anda ingin membatalkan Pengajuan ini ?</h5>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?= base_url('form/delete/' . $value->id_cuti)?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <?php }?>

    <!--End Modal Delete-->

  </div>