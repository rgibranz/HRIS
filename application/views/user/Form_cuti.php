<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->

                <?php echo form_open_multipart('form/cuti_add') ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <h5><?= $karyawan->nama_karyawan ?></h5>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan" value="<?= $karyawan->nama_karyawan ?>" hidden>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mulai Bekerja</label>
                        <input type="text" name="mulai_bekerja" class="form-control" id="exampleInputEmail1" placeholder="Tanggal-Bulan-Tahun">
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lokasi selama Cuti</label>
                            <input type="text" name="lokasi_cuti" class="form-control" id="exampleInputEmail1" placeholder="Jenis Cuti">
                            <small class="text-danger"><?= form_error('jenis_cuti'); ?></small>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <input type="text" name="lama_cuti" class="form-control" id="exampleInputEmail1" placeholder="Lama Cuti">
                            <small class="text-danger"><?= form_error('lama_cuti'); ?></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sisa Cuti</label>
                            <input type="text" name="sisa_cuti" value="<?= $karyawan->sisa_cuti ?>" class="form-control" id="exampleInputEmail1" readonly>
                            <small class="text-danger"><?= form_error('sisa_cuti'); ?></small>

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
                            <label>Sampai Tanggal</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" name="sampai_tanggal" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Tanggal-bulan-Tahun" />
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <small class="text-danger"><?= form_error('sampai_tanggal'); ?></small>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan_manajer" cols="30" rows="3"></textarea>
                        <small class="text-danger"><?= form_error('keterangan_menejer'); ?></small>
                    </div>
                </div>


                <div>
                    <div class="form-group">
                        <input type="text" name="tgl_pengajuan" value="<?php echo date("Y-m-d"); ?>" hidden>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <input type="text" name="id_karyawan" value="<?= $karyawan->id_karyawan ?>" hidden>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6 text-left">
                        <a href="<?= base_url('dasboard_user') ?>" class=" btn btn-outline-secondary">Batal</a>
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
                title: "Gagal Mengajuakn Cuti",
                text: "Jumlah cuti yang anda miliki tidak cukup",
                button: false,
                timer: 5000,
            });
        </script>
    <?php endif; ?>