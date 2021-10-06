<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <hr>
      <div class="card-text">
        <!--Start Formulir-->
        <?php
        echo form_open_multipart('karyawan/edit_aksi/' . $karyawan->id_karyawan)
        ?>

        <div class="row">
          <div class="col-lg-8">


            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan" value="<?= $karyawan->nama_karyawan ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" name="tmpt_lahir" class="form-control" id="exampleInputEmail1" placeholder="Tempat Lahir" value="<?= $karyawan->tmpt_lahir ?>">
                </div>
              </div>
              <div class="col-md-3">

                <div class="form-group">
                  <label>Tanggal lahir</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $karyawan->tgl_lahir ?>" name="tgl_lahir" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>


            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Alamat KTP</label>
                <textarea class="form-control" name="alamat_ktp" rows="3" placeholder="Alamat"><?= $karyawan->alamat_ktp ?></textarea>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Alamat domisili</label>
                <textarea class="form-control" name="alamat_domisili" rows="3" placeholder="Alamat"><?= $karyawan->alamat_domisili ?></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan" value="<?= $karyawan->no_hp ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>


              <div class="form-group">
                <label>Nomor Hp darurat</label>
                <input type="text" name="no_hp_d" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan" value="<?= $karyawan->no_hp ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email" value="<?= $karyawan->email ?>">
              </div>

              <div class="form-group">
                <label> Divisi</label>
                <select name="id_divisi" class="form-control">
                  <option value="<?= $karyawan->id_divisi ?>"><?= $karyawan->nama_divisi ?></option>
                  <?php foreach ($divisi as $key => $value) { ?>
                    <option value="<?= $value->id_divisi ?>"><?= $value->nama_divisi ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label> Status Karyawan</label>
                <select name="status_karyawan" class="form-control">
                  <option value="<?= $karyawan->status_karyawan?>"><?= $karyawan->status_karyawan?></option>
                  <option value="Probation">Probation</option>
                  <option value="Karyawan tetap">Karyawan Tetap</option>
                  <option value="Freelance">Freelance</option>
                  <option value="Resign">Resign</option>
                </select>
              </div>

              <div class="form-group">
                <label>Posisi</label>
                <input type="text" name="job" class="form-control" placeholder="Nama Karyawan" value="<?= $karyawan->job ?>">
              </div>

              <div class="form-group">
                <label>password Akun</label>
                <input type="password" name="password" class="form-control" placeholder="password" value="">
              </div>

              <div class="form-group">
                <label> Role User</label>
                <select name="level" class="form-control">
                  <option value="<?= $karyawan->level ?>"><?= $karyawan->level ?></option>
                  <?php 
                  $x = 1;
                  foreach ($role as $key => $value) {?>
                  <option value="<?= $x++ ?>" hidden></option>
                  <option value="<?= $value->users_role?>"><?= $value->users_role?></option>
                  <?php } ?>
            
                </select>
              </div>

              <div class="form-group">
                <label>Gaji</label>
                <input type="text" value="<?= $karyawan->gaji ?>" name="gaji" class="form-control" placeholder="Gaji" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              </div>

          </div>
          <div class="col-md-3">

            <div class="form-group text-center">
              <img src="<?= base_url('assets/gambar/user/' . $karyawan->img) ?>" alt="" width="200px" height="240px" id="gambar_load">
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Upload Gambar</label>
              <input type="file" class="form-control" id="preview_gambar" name="img" >
            </div>

          </div>
        </div>



        <div class="row">
          <div class="col-md-6 text-left">
            <a href="<?= base_url('karyawan') ?>" class=" btn btn-outline-secondary">Batal</a>
          </div>
          <div class="col-md-6 text-right">
            <button class="btn btn-outline-success">Simpan</button>
          </div>
        </div>

      </div>

    </div>
    <?php echo form_close() ?>
    <!--End Formulir-->
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
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#gambar_load').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#preview_gambar").change(function() {
    bacaGambar(this);
  });
</script>