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
                <p><?= $users->nama_users ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Tanggal Lahir</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $users->tmpt_lahir ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Tanggal Lahir</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $users->tgl_lahir ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Alamat KTP</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-2"><?= $users->alamat_ktp ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Alamat Domisili</label>
              <div class="col-sm-3 ml-4">
                <?php if ($users->alamat_domisili == '') { ?>
                  <p>Sesuai dengan Alamat KTP</p>
                <?php } ?>
                <p><?= $users->alamat_domisili ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Nomor Hp</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-3"><?= $users->no_hp ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Nomor Hp Darurat</label>
              <div class="col-sm-3">
                <p class="ml-2"><?= $users->no_hp_d ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom mr-2">
              <label style="color: blue;">Email</label>
              <div class="col-sm-6 ml-5">
                <p class="ml-5"><?= $users->email ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Divisi</label>
              <div class="col-sm-5 ml-5">
                <p class="ml-5"><?= $users->nama_divisi ?></p>
              </div>
            </div>

            <div class="form-group row border-bottom">
              <label style="color: blue;">Jabatan</label>
              <div class="col-sm-3 ml-5">
                <p class="ml-4 pl-1"><?= $users->job ?></p>
              </div>
            </div>
          </div>
          <div class="form-group text-center mt-5 ml-5">
            <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" alt="" width="200px" height="240px" id="gambar_load">
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