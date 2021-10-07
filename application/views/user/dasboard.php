<div class="col-lg-3 col-6">

    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>Divisi</h3>

            <p><?= $karyawan->nama_divisi ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-android-contacts"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<div class="col-lg-3 col-6">

    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>Posisi</h3>

            <p><?= $karyawan->job ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-ios-briefcase"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>Gaji</h3>

            <p><?= "Rp " . number_format($karyawan->gaji, 2, ',', '.'); ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-cash"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3>Status</h3>

            <p><?= $karyawan->status_karyawan ?></p>
        </div>
        <div class="icon">
            <i class="ion ion-android-bookmark"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>