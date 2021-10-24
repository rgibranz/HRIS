<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <h5><?= $list_cuti->nama_users ?></h5>
                            <input type="text" name="nama_users" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->nama_users ?>" hidden>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mulai Bekerja</label>
                            <h5><?= $list_cuti->mulai_bekerja ?></h5>
                            <input type="text" value="<?= $list_cuti->mulai_bekerja ?>" name="mulai_bekerja" class="form-control" id="exampleInputEmail1" hidden>
                        </div>

                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <h5><?= $list_cuti->lama_cuti ?></h5>
                            <input type="text" name="lama_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->lama_cuti ?>" hidden>
                        </div>

                        <div class="form-group">
                            <label>Mulai dari Tanggal</label>
                            <h5><?= date('d-m-Y', strtotime($list_cuti->mulai_tanggal));  ?></h5>

                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan_cuti" cols="30" rows="3" readonly><?= $list_cuti->keterangan_cuti ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pengajuan</label>
                            <h5> <?= $list_cuti->tgl_pengajuan ?> </h5>
                            <input type="text" name="tgl_pengajuan" value="<?php echo date("Y-m-d"); ?>" hidden>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Cuti</label>
                            <h5><?= $list_cuti->jenis_cuti ?></h5>
                            <input type="text" name="jenis_cuti" class="form-control" id="exampleInputEmail1" value="<?= $list_cuti->jenis_cuti ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label>Sisa Cuti</label>
                            <h5><?= $list_cuti->sisa_cuti ?></h5>
                            <input type="text" value="<?= $list_cuti->sisa_cuti ?>" name="sisa_cuti" class="form-control" id="exampleInputEmail1" placeholder="Sisa Cuti" hidden>
                        </div>

                        <div class="form-group">
                            <label>Sampai dengan</label>
                            <h5><?= date('d-m-Y', strtotime($list_cuti->sampai_tanggal));  ?></h5>

                        </div>


                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan Konfirmasi Manajer</label>
                            <textarea class="form-control" name="keterangan_cuti" cols="30" rows="3" readonly><?= $list_cuti->keterangan_manajer ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Keterangan Konfirmasi direktur</label>
                            <textarea class="form-control" name="keterangan_cuti" cols="30" rows="3" readonly><?= $list_cuti->keterangan_direktur ?></textarea>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>


</div>