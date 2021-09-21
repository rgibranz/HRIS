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

      <div  class="card-body">
        <table class="table table-bordered" id="example1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Job</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_devisi ?></td>
                <td>
                  <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?=$value->id_devisi?>"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
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
            <div class="form-group">
              <label>Nama Divisi</label>
              <input type="text" class="form-control" name="nama_devisi" placeholder="Nama devisi">
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

        <!-- model Delete-->
        <div class="modal fade" id="delete<?=$value->id_devisi?>">
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
            <a href="#" class="btn btn-danger">Delete</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<!--End Modal Delete-->

  </div>