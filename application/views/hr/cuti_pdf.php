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
        <p>Yang bertanda tangan di bawah ini :</p>
        <p>Nama Lengkap : <?= $profile->nama_users ?></p>
        <p>Mulai Bekerja : <?= $profile->mulai_bekerja ?></p>
        <p>Dengan ini mengajukan Cuti :</p>
        <p>Jenis cuti : <?= $profile->jenis_cuti ?></p>
        <p>Lama cuti : <?= $profile->lama_cuti ?> hari </p>
        <p>Mulai tanggal : <?= date('d-m-Y', strtotime($profile->mulai_tanggal));  ?></p>
        <p>Sampai tanggal : <?= date('d-m-Y', strtotime($profile->sampai_tanggal));  ?></p>
        <p>Demikian permohonan Cuti ini saya Buat sesuai dengan keadaan yang sebenarnya.</p>
        <div style="float: left;">
            <p>Jakarta <?= date('d-m-Y', strtotime($profile->tgl_pengajuan));  ?></p>
            <p></p>
            <p>Mengetauhi</p>
            <br>
            <P>TTD</P>
            <br>
            <P><?= $profile->nama_users ?></P>
        </div>
        <div style="float: right;">
            <br>
            <br>
            <p>Mengajukan</p>
            <br>
            <P>TTD</P>
            <br>
            <P><?= $profile->nama_users ?></P>
            <div class="kecil">Divisi <?= $profile->nama_divisi ?></div>
        </div>
    </div>



</body>

</html>