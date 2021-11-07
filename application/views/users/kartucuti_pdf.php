<?php
$tanggalx = explode('-', $cek->tgl_pengajuan);
if ($tanggalx[0] != $tahun) {
    $this->session->set_flashdata('kosong', 'tahun tidak ada');
    redirect('karyawan/cuti/kartu_cuti');
} else { ?>

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
                margin: 60px, 40px;
            }

            .isihead {
                margin-top: -15px;
                font-weight: bold;
                font-size: 13px;
            }

            .kecil {
                margin-top: -15px;
                font-size: 10px;
            }


            .thb {
                margin-top: 50px;
                border: 1px solid #999;
                margin-left: 50px;
                border-collapse: collapse;
            }

            .thb th {
                border: 1px solid #999;
                padding: 8px 20px;
            }

            .thb td {
                border: 1px solid #999;
                padding: 8px 20px;
            }
        </style>
    </head>

    <body>
        <header>
            <img src="<?= base_url() ?>assets/gambar/icon/Untitled-1cc.png" alt="Logo" width="150" style="opacity: .8">
        </header>
        <h3 style="text-align: center;"> <?= $title ?></h3>

        <div class="bodyisi">
            <div style="float: left;">
                <table style="border: none;">
                    <th>Nama</th>
                    <th>: <?= $users->nama_users ?></th>
                </table>
                <table style="border: none;">
                    <th>Jabatan</th>
                    <th>:<?= $users->job ?></th>
                </table>
            </div>

            <div style="float: right;">
                <table style="border: none;">
                    <th>Tahun</th>
                    <th> <?= $tahun ?> </th>
                </table>
                <table style="border: none;">
                    <th>Total Cuti</th>
                    <th><?= $limite->cuti_awal ?></th>
                </table>
            </div>
        </div>

        <div>
            <table class="thb">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan Cuti</th>
                        <th>Cuti yang diambil</th>
                        <th>Sisa Cuti</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($list_cuti as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->jenis_cuti ?></td>
                            <td><?= $value->lama_cuti ?></td>
                            <?php if ($value->status_manajer == "accept") { ?>
                                <?php if ($value->status_direktur == "reject") { ?>
                                    <td><?= $value->cuti_awal ?></td>
                                    <td><?= $value->status_direktur ?> oleh direktur</td>
                                <?php } else { ?>
                                    <td><?= $value->sisa_cuti ?></td>
                                    <td><?= $value->status_manajer ?></td>
                                <?php } ?>
                            <?php }
                            if ($value->status_manajer == "reject") { ?>
                                <td><?= $value->cuti_awal ?></td>
                                <td><?= $value->status_manajer ?> oleh manajer</td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php } ?>