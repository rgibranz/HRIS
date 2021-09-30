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
              <td>Nama</td>
              <th>Jenis Cuti</th>
              <th>Tanggal Pengajuan</th>
              <th>status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($list_cuti as $key => $value) { 
              ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_karyawan?></td>
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
                <p class="text-warning">Menungu Konfirmasi</p>
              <?php  } ?>
              </td>
                    
                <td> <a href="<?= base_url('form/view_cuti/' . $value->id_cuti) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
              </tr>
            <?php   }?>
            
          </tbody>
        </table>

      </div>
    </div>

    <!-- model Delete-->

    <!--End Modal Delete-->

  </div>