<div class="col-lg-12">
  <div class="card">
    <div class="card-body">



      <div class="card-text">
        <!--Start Formulir-->

        <div class="row">
          <div class="col-md-8">

            <div class="form-group row border-bottom mt-3">
              <label style="color: blue;">Nama Lengkap</label>
              <div class="col-sm-3 ml-5">
                <p><?= $karyawan->nama_karyawan ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Tanggal Lahir</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $karyawan->tmpt_lahir ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Tanggal Lahir</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $karyawan->tgl_lahir ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Alamat KTP</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $karyawan->alamat_ktp ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Alamat Domisili</label>
              <div class="col-sm-3 ml-4">
                <?php if ($karyawan->alamat_domisili == '') { ?>
                  <p>Sesuai dengan Alamat KTP</p>
                <?php } ?>
                <p><?= $karyawan->alamat_domisili ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Nomor Hp</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-3"><?= $karyawan->no_hp ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Nomor Hp Darurat</label>
              <div class="col-sm-3">
                <p class="ml-2"><?= $karyawan->no_hp_d ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom mr-2">
              <label style="color: blue;">Email</label>
              <div class="col-sm-6 ml-5">
                <p class="ml-5"><?= $karyawan->email ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Divisi</label>
              <div class="col-sm-5 ml-5">
                <p class="ml-5"><?= $karyawan->nama_divisi ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Jabatan</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-4 pl-1"><?= $karyawan->job ?></p>
              </div>
            </div>
          </div>
          <div class="form-group text-center mt-5 ml-5">
            <img src="<?= base_url('assets/gambar/user/' . $karyawan->img) ?>" alt="" width="200px" height="240px" id="gambar_load">
          </div>
        </div>
      </div>
    </div>
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