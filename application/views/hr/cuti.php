<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->
                <?php echo form_open_multipart('form/cuti_edit/') ?>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h5 class="text-center mb-5">Nama : <?= $list_cuti->nama_users ?></h5>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Cuti</label>
                            <input type="text" name="jenis_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->jenis_cuti ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Sisa Cuti</label>
                            <input type="text" value="<?= $list_cuti->sisa_cuti ?>" name="sisa_cuti" class="form-control" id="exampleInputEmail1" placeholder="Sisa Cuti" readonly>
                        </div>

                        <div class="form-group">
                            <label>Mulai dari</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" value="<?= date('d-m-Y', strtotime($list_cuti->mulai_tanggal)); ?>" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal/Bulan/Tahun" readonly>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan Cuti</label>
                            <textarea class="form-control" name="keterangan_cuti" cols="30" rows="3" readonly><?= $list_cuti->keterangan_cuti ?></textarea>
                        </div>


                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mulai Bekerja</label>
                            <input type="text" value="<?= $list_cuti->mulai_bekerja ?>" name="mulai_bekerja" class="form-control" id="exampleInputEmail1" readonly>
                        </div>

                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <input type="text" name="lama_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->lama_cuti ?>" readonly>
                        </div>
                        <div class="form-group">

                            <label>Sampai dengan</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" value="<?= date('d-m-Y', strtotime($list_cuti->sampai_tanggal));  ?>" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal/Bulan/Tahun" readonly>

                            </div>
                        </div>

                        <div class="form-group text-right mt-5">
                            <label>Tanggal Pengajuan</label>
                            <p class="text-right"> <?= date('d-m-Y', strtotime($list_cuti->tgl_pengajuan)); ?> </p>
                        </div>


                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan manajer</label>
                            <textarea class="form-control" name="keterangan_manajer" cols="10" rows="3" readonly><?= $list_cuti->keterangan_manajer ?></textarea>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan direktur</label>
                            <textarea class="form-control" name="keterangan_direktur" cols="10" rows="3" readonly><?= $list_cuti->keterangan_direktur ?></textarea>
                        </div>
                    </div>
                </div>


            </div>
            <?php echo form_close(); ?>
            <!--End Formulir-->
        </div>
    </div>



    <script>
        $(function() {
            //Date range picker
            $('#reservationdate1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
            $('#reservationdate1').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
    </script>
</div>