  <!-- /.col-md-6 -->
  <div class="col-md-12">
      <div class="card card-primary">
          <div class="card-header">
              <div class="card-title"> Data <?= $title ?></div>
              <div class="card-tools">

              </div>
          </div>

          <div class="card-body">
              <?php echo form_open_multipart('karyawan/pdfview/') ?>
              <div class="row">

                  <div class="col-md-3">
                      <label>Tahun </label>
                  </div>

                  <div class="col-md-3">
                      <input name="tahun" class="form-control" placeholder="Tahun" onkeypress="return event.charCode >= 48 && event.charCode <=57"></input>
                  </div>
                  <div class="col-md-1">
                      <button type="submit" class="btn btn-primary">Pilih</button>
                  </div>
              </div>
              <?php form_close() ?>
          </div>
      </div>
  </div>

  <?php if ($this->session->flashdata('kosong')) : ?>
      <script>
          swal.fire({
              icon: "error",
              title: "kosong",
              text: "Tidak ada Data pada Tahun yang anda masukan",
              button: false,
              timer: 3000,
          });
      </script>
  <?php endif; ?>