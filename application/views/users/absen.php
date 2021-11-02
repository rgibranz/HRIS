  <!-- /.col-md-6 -->
  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
              <div class="card-title"> Data <?= $title ?></div>
              <div class="card-tools">

              </div>
          </div>

          <div class="card-body">

              <div class="row mb-3">
                  <div class="ml-2">
                      <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tanggal = $absen_end->tgl;
                        $hari_ini = date('y-m-d');
                        if ($tanggal == $hari_ini) {
                        ?>
                          <a href="<?= base_url('karyawan/absen/masuk') ?>" class="btn btn-primary btn-sm">Absen Masuk</a>
                      <?php } else { ?>
                          <a href="<?= base_url('karyawan/absen/masuk') ?>" class="btn btn-primary btn-sm disabled">Absen Masuk</a>

                      <?php } ?>
                      <?php
                        if ($absen_end == '') { ?>
                          <button class="btn btn-primary btn-sm" disabled>Absen Pulang</button>
                          <?php
                        } else {
                            date_default_timezone_set('Asia/Jakarta');
                            // waktu pulang
                            $wkt_datang = $absen_end->waktu_datang;
                            $timestamp = strtotime($wkt_datang) + 15;
                            $time = date('H:i:s', $timestamp);
                            $wkt_pulang = date('H:i:s');
                            //end waktu pulang

                            if ($absen_end->waktu_pulang != '') { ?>
                              <button class="btn btn-primary btn-sm" disabled>Absen Pulang</button>
                          <?php } elseif ($time <=  $wkt_pulang) { ?>
                              <a href="<?= base_url('karyawan/absen/pulang/' . $absen_end->id_absen) ?>" class="btn btn-primary btn-sm">Absen Pulang</a>
                          <?php } else { ?>
                              <button class="btn btn-primary btn-sm" disabled>Absen Pulang</button>

                      <?php }
                        } ?>
                  </div>

              </div>

              <!--Table-->


              <table class="table table-bordered text-center" id="example1">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Masuk</th>
                          <th>Pulang</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($absen as $key => $value) { ?>
                          <tr>
                              <td><?= $no++; ?></td>
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