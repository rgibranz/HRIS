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
                      <a href="<?= base_url('absen/masuk') ?>" class="btn btn-primary btn-sm">Absen Masuk</a>
                      <a href="<?= base_url('absen/pulang') ?>" class="btn btn-primary btn-sm">Absen Pulang</a>

                  </div>

              </div>

              <!--Table-->


              <table class="table table-bordered text-center" id="example1">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>waktu</th>
                          <th>Status</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($absen as $key => $value) { ?>
                          <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $value->tgl ?></td>
                              <td><?= $value->waktu ?></td>
                              <td><?= $value->status ?></td>

                          </tr>
                      <?php } ?>
                  </tbody>
              </table>

          </div>
      </div>

  </div>