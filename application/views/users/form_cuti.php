<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->

                <?php echo form_open_multipart('karyawan/cuti/add') ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nama_users" class="form-control" id="exampleInputEmail1" placeholder="Nama users" value="<?= $users->nama_users ?>" hidden>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="mulai_bekerja" class="form-control" id="exampleInputEmail1" placeholder="Tanggal-Bulan-Tahun" value="<?= $users->mulai_bekerja ?>" hidden>
                        <small class="text-danger"><?= form_error('mulai_bekerja'); ?></small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Jenis Cuti</label>
                            <input type="text" name="jenis_cuti" class="form-control" id="exampleInputEmail1" placeholder="Jenis Cuti">
                            <small class="text-danger"><?= form_error('jenis_cuti'); ?></small>
                        </div>
                    </div>
                    <!-- 
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lokasi selama Cuti</label>
                            <input type="text" name="lokasi_cuti" class="form-control" id="exampleInputEmail1" placeholder="Jenis Cuti">
                            <small class="text-danger"><?= form_error('jenis_cuti'); ?></small>
                        </div>
                    </div> -->

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <input type="text" name="lama_cuti" class="form-control" id="exampleInputEmail1" placeholder="Lama Cuti" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                            <small class="text-danger"><?= form_error('lama_cuti'); ?></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Mulai dari Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="mulai_tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal-bulan-Tahun" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <small class="text-danger"><?= form_error('mulai_cuti'); ?></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sisa Cuti</label>
                            <input type="text" name="sisa_cuti" value="<?= $users->sisa_cuti ?>" class="form-control" id="exampleInputEmail1" readonly>
                            <small class="text-danger"><?= form_error('sisa_cuti'); ?></small>
                        </div>
                    </div>
                </div>





                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan_cuti" cols="30" rows="3"></textarea>
                        <small class="text-danger"><?= form_error('keterangan_cuti'); ?></small>
                    </div>
                </div>


                <div>
                    <div class="form-group">
                        <input type="text" name="tgl_pengajuan" value="<?php echo date("Y-m-d"); ?>" hidden>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <input type="text" name="id_users" value="<?= $users->id_users ?>" hidden>
                        <input type="text" name="nama_divisi" value="<?= $users->nama_divisi ?>" hidden>

                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 text-left">
                        <button class=" btn btn-outline-secondary" onclick="window.history.back()">Batal</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-outline-success">Ajukan</button>
                    </div>
                </div>
            </div>

            <?php echo form_close(); ?>
            <!--End Formulir-->
        </div>
    </div>
</div>



<script>
    $(function() {
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        //Date range picker
        $('#reservationdate2').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    })
</script>

<?php if ($this->session->flashdata('invalidcuti')) : ?>
    <script>
        swal.fire({
            title: "Gagal Mengajukan Cuti",
            text: "Jumlah cuti yang anda miliki tidak cukup",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('masihjalan')) : ?>
    <script>
        swal.fire({
            title: "Gagal Mengajukan Cuti",
            text: "Masih dalam Proses Pertinjauan",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>