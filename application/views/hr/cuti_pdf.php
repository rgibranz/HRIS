<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <style>
        .bodyisi {
            margin: 40px, 40px;
        }
        .isihead{
            margin-top: -15px;
            font-weight: bold;
            font-size: 13px;
        }

        .kecil {
            margin-top: -15px;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <header>
        <img src="<?= base_url() ?>assets/gambar/icon/Untitled-1cc.png" alt="Logo" width="150" style="opacity: .8">
    </header>
    <h3 style="text-align: center;"> FORMULIR PENGAJUAN CUTI</h3>

    <div class="bodyisi">
        <p class="isihead">Kepada :</p>
        <p class="isihead">Yth. Divisi GA & HRD</p>
        <P class="isihead">PT. Korpora Trainindo Consultant</P>
        
        <p>Yang bertanda tangan di bawah ini :</p>
        <p>Nama Lengkap : <?= $profile->nama_users ?></p>
        <p>Mulai Bekerja : <?= date('d-m-Y', strtotime($profile->mulai_bekerja)); ?></p>
        <p>Dengan ini mengajukan Cuti <?= $profile->jenis_cuti ?> selama <?= $profile->lama_cuti ?> hari </p>
        <p>Mulai Tanggal <?= date('d-m-Y', strtotime($profile->mulai_tanggal));  ?></p>
        <p>Sampai Tanggal <?= date('d-m-Y', strtotime($profile->sampai_tanggal)); ?></p>
        <p>Sisa cuti <?= $profile->sisa_cuti ?></p>
        <p>Demikian permohonan Cuti ini saya buat sesuai dengan keadaan yang sebenarnya.</p>
        <div style="float: left;">
            <p>Jakarta, <?= date('d/m/Y', strtotime($profile->tgl_pengajuan));  ?></p>
            <p></p>
            <p>Mengetauhi</p>
            <br>
            <br>
            <P><?= $profile->nama_direktur ?></P>
            <div class="kecil">direktur</div>
        </div>
        <div style="float: right;">
            <br>
            <br>
            <p>Mengajukan</p>
            <br>
            <br>
            <P><?= $profile->nama_users ?></P>
            <div class="kecil">Divisi <?= $profile->nama_divisi ?></div>
        </div>
    </div>



</body>

</html>