          <div class="col-md-6 offset-md-3">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-warning">
                      <img src="<?= base_url('assets/gambar/icon/Untitled-1cc.png') ?>" height="75px">
                  </div>
                  <div class="widget-user-image mt-3">
                      <img class="img-circle elevation-3" src="<?= base_url('assets/gambar/user/' . $karyawan->img) ?>" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-sm-4 border-right">
                              <div class="description-block">
                                  <h5 class="description-header">Jabatan</h5>
                                  <span class="description-text"><?= $karyawan->job ?></span>
                              </div>
                              <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 border-right">
                              <div class="description-block">
                                  <h5 class="description-header">Nama</h5>
                                  <span class="description-text"><?= $karyawan->nama_karyawan ?></span>
                              </div>
                              <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4">
                              <div class="description-block">
                                  <h5 class="description-header">Divisi</h5>
                                  <span class="description-text"><?= $karyawan->nama_divisi ?></span>
                              </div>
                              <!-- /.description-block -->
                          </div>
                          <!-- /.col -->
                      </div>
                      <!-- /.row -->
                  </div>
              </div>
              <!-- /.widget-user -->
          </div>
          <!-- /.col -->