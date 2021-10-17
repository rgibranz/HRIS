<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <h5>Form <?= $title ?></h5>
      <hr>
      <div class="card-text">
        <!--Start Formulir-->
        <?php             //Notifikasi form kosong
        echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>'); ?>
        <?php echo form_open_multipart('karyawan/add') ?>
        <div class="row">
          <div class="col-lg-9">

            <div class="col-md-8">
              <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan">
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <label>Tanggal Mulai Bekerja</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" name="mulai_bekerja" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal-bulan-Tahun" />
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" name="tmpt_lahir" class="form-control" id="exampleInputEmail1" placeholder="Tempat Lahir">
                </div>
              </div>

              <!-- <div class="col-md-3">
                <div class="form-group">
                  <label>Tanggal lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal-bulan-Tahun" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Alamat Sesuai KTP</label>
                <textarea class="form-control" name="alamat_ktp" rows="3" placeholder="Alamat"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Alamat Domisili</label>
                <textarea class="form-control" name="alamat_domisili" rows="3" placeholder="Tidak Wajib Jika alamat KTP dan domisili sama"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="No Hp" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

              <div class="form-group">
                <label>Nomor Hp Darurat</label>
                <input type="text" name="no_hp_d" class="form-control" id="exampleInputEmail1" placeholder="Nomor Hp" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email">
              </div>

              <div class="form-group">
                <label> Divisi</label>
                <select name="id_divisi" class="form-control">
                  <option value="">--Pilih divisi --</option>
                  <?php
                  $x = 1;
                  foreach ($divisi as $key => $value) { ?>
                    <option value="<?= $x++ ?>" hidden></option>
                    <option value="<?= $value->id_divisi ?>"><?= $value->nama_divisi ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label> Status Karyawan</label>
                <select name="status_karyawan" class="form-control">
                  <option value="">--Pilih Status Karyawan --</option>
                  <option value="Probation">Probation</option>
                  <option value="Karyawan tetap">Karyawan Tetap</option>
                  <option value="Freelance">Freelance</option>
                  <option value="Resign">Resign</option>
                </select>
              </div>

              <div class="form-group">
                <label>Posisi</label>
                <input type="text" name="job" class="form-control" placeholder="Jabatan/Posisi">
              </div>


              <div class="form-group">
                <label>password Akun</label>
                <input type="password" name="password" class="form-control" placeholder="password">
              </div>

              <div class="form-group">
                <label> Role User</label>
                <select name="level" class="form-control">
                  <option value="">--Pilih Role User --</option>
                  <?php
                  $x = 1;
                  foreach ($role as $key => $value) { ?>
                    <option value="<?= $x++ ?>" hidden></option>
                    <option value="<?= $value->users_role ?>"><?= $value->users_role ?></option>
                  <?php } ?>

                </select>
              </div>

              <div class="form-group">
                <label>Gaji</label>
                <input type="text" name="gaji" class="form-control" placeholder="Gaji" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

              <div class="form-group">
                <label for="">Jumalah Cuti </label>
                <input type="text" name="sisa_cuti" class="form-control" placeholder="" aria-describedby="helpId" placeholder="Cuti dalam 1 Tahun" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

            </div>
          </div>

          <div class=" col-md-3">

            <div class="form-group text-center">
              <img src="" alt="" width="200px" height="240px" id="gambar_load">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Upload Gambar</label>
              <input type="file" class="form-control" id="preview_gambar" name="img" required>
            </div>

          </div>
        </div>



        <div class="row">
          <div class="col-md-6 text-left">
            <a href="<?= base_url('karyawan') ?>" class=" btn btn-outline-secondary">Batal</a>
          </div>
          <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-outline-success">Simpan</button>
          </div>
        </div>



        <?php echo form_close(); ?>
        <!--End Formulir-->
      </div>
    </div>
  </div>

</div>



<script>
  $(function() {
    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'YYYY-MM-DD'
    });
  })
</script>
<script>
  function bacaGambar(input) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#gambar_load').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }

  $("#preview_gambar").change(function() {
    bacaGambar(this);
  });
</script>