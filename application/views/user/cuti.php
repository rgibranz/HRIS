<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->

                <?php echo form_open_multipart('form/cuti_edit/' ) ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <h5><?= $list_cuti->nama_karyawan ?></h5>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->nama_karyawan ?>" hidden>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mulai Bekerja</label>
                        <h5><?= $list_cuti->mulai_bekerja ?></h5>
                        <input type="text" value="<?= $list_cuti->mulai_bekerja ?>" name="mulai_bekerja" class="form-control" id="exampleInputEmail1" hidden>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Cuti</label>
                        <h5><?= $list_cuti->jenis_cuti ?></h5>
                        <input type="text" name="jenis_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->jenis_cuti ?>" hidden>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <h5><?= $list_cuti->lama_cuti ?></h5>
                            <input type="text" name="lama_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->lama_cuti ?>" hidden>
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Tanggal</label>
                            <h5><?= $list_cuti->tanggal ?></h5>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" value="<?= $list_cuti->tanggal?>" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal/Bulan/Tahun" hidden>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sisa Cuti</label>
                       <h5><?= $list_cuti->sisa_cuti ?></h5>
                        <input type="text" value="<?= $list_cuti->sisa_cuti ?>"name="sisa_cuti" class="form-control" id="exampleInputEmail1" placeholder="Sisa Cuti" readonly>
                    </div>
                </div>


                <div>
                    <div class="form-group">
                        <label>Tanggal Pengajuan</label>
                   <h5> <?= $list_cuti->tgl_pengajuan ?> </h5>
                        <input type="text" name="tgl_pengajuan" value="<?php echo date("Y-m-d"); ?>" hidden>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <input type="text" name="id_karyawan" value="<?= $list_cuti->id_karyawan ?>" hidden>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <input type="text" name="id_cuti" value="<?= $list_cuti->id_cuti ?>" hidden>
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
            $('#reservationdate').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
    </script>