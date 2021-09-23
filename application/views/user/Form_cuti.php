<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <hr>
            <div class="card-text">
                <!--Start Formulir-->
                <?php             //Notifikasi form kosong
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>'); ?>
                <?php echo form_open_multipart('karyawan/add') ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Nama Karyawan">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mulai Bekerja</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Hari/Bulan/Tahun">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Cuti</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Jenis Cuti">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lama Cuti</label>
                            <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Lama Cuti">
                        </div>
                    </div>

                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tgl_lahir" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sisa Cuti</label>
                        <input type="text" name="nama_karyawan" class="form-control" id="exampleInputEmail1" placeholder="Sisa Cuti">
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="" id="">
                        </div>
                    </div>
                    <div>
                        <div class="form-group"> 
                        <input type="hidden" name="tanggal" value="<?php echo date("d/m/Y"); ?>">
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
            $('#reservationdate').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        })
    </script>