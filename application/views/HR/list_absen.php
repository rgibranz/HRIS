  <!-- /.col-md-6 -->
  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
              <div class="card-title"> Data <?= $title ?></div>
              <div class="card-tools">

              </div>
          </div>

          <div class="card-body">
              <!--Table-->
              <table class="table table-bordered text-center" id="example1">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Masuk</th>
                          <th>Pulang</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($list_absen as $key => $value) { ?>
                          <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $value->nama_karyawan ?></td>
                              <td><?= $value->tgl ?></td>
                              <td><?= $value->waktu_datang ?></td>
                              <td><?= $value->waktu_pulang ?></td>

                          </tr>
                      <?php } ?>
                  </tbody>
              </table>

          </div>
      </div>
  </div>