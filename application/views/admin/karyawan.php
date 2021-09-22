  <!-- /.col-md-6 -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <div class="card-title"> Data <?= $title ?></div>
        <div class="card-tools">
          <a href="<?= base_url('karyawan/add')?>" class="btn btn-primary btn-sm">
            <i class=" fa fa-plus"></i>
            Add
          </a>
        </div>
      </div>

      <div  class="card-body">

      <!--Table-->
        <table class="table table-bordered text-center" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>devisi</th>
              <th>Job</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $key => $value) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_karyawan ?></td>
                <td><?= $value->nama_devisi?></td>
                <td><?= $value->job?></td>
                <td>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_devisi?>"><i class="fa fa-edit"></i></button>
                  <a href="<?= base_url('karyawan/edit' . $value->id_karyawan)?>"class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$value->id_devisi?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>

        <!-- model Delete-->
        <?php foreach ($karyawan as $key => $value) {?>
        <div class="modal fade" id="delete<?=$value->id_karyawan?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus <?= $title ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('devisi/delete'); ?>

            <h5>Apakah anda kayakin Menghapus Data ini ?</h5>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="<?= base_url('devisi/delete/' . $value->id_devisi)?>" class="btn btn-danger">Delete</a>
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