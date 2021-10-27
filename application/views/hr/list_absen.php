  <!-- /.col-md-6 -->
  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
              <div class="card-title"> Data <?= $title ?></div>
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
                          <th>view</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($list_absen as $key => $value) { ?>
                          <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $value->nama_users ?></td>
                              <td><?= $value->tgl ?></td>
                              <td><?= $value->waktu_datang ?></td>
                              <td><?= $value->waktu_pulang ?></td>
                              <td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view<?= $value->id_absen ?>"><i class="fa fa-eye"></i></button>
                              </td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>


      <!-- Modal view gambar -->
      <?php foreach ($list_absen as $key) { ?>
          <div class="modal fade" id="view<?= $key->id_absen ?>" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="row justify-content-center">
                              <div class="col-lg-12">
                                  <div class="form-group text-center">
                                      <img src="<?= base_url('assets/gambar/absen/' . $key->img_absen) ?>" alt="">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
      <?php } ?>

  </div>