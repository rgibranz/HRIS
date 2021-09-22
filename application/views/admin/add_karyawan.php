<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <hr>
      <div class="card-text">
      <!--Start Formulir-->
      <?php             //Notifikasi form kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>','</h5></div>');?>
      <?php echo form_open_multipart('karyawan/add')?>
      <div class="col-md-6">
        <div class="form-group">
          <label>Nama Karyawan</label>
          <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan">
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" name="tmpt_lahir" class="form-control" id="exampleInputEmail1" placeholder="Tempat Lahir">
          </div>
        </div>
        <div class="col-md-3">

          <div class="form-group">
            <label>Tanggal lahir</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text"name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </div>


      </div>


      <div class="col-md-6">
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Nomor Hp</label>
          <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="No Hp">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email">
        </div>

        <div class="form-group">
          <label> Devisi</label>
          <select name="id_devisi" class="form-control">
            <option value="">--Pilih Devisi --</option>
            <?php foreach ($devisi as $key => $value) { ?>
              <option value="<?= $value->id_devisi ?>"><?= $value->nama_devisi ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Jabatan</label>
          <input type="text" name="job" class="form-control" placeholder="Nama Karyawan">
        </div>


        <div class="form-group">
          <label>password Akun</label>
          <input type="password" name="password" class="form-control" placeholder="password">
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

    </div>

  </div>
  <?php echo form_close();?>
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