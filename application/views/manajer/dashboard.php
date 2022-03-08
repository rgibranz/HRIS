<div class="col-lg-12">
    <style>
        body {
            background-color: #f9f9fa
        }

        .padding {
            padding: 3rem !important
        }

        .user-card-full {
            overflow: hidden
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            /* background: linear-gradient(to right, #ee5a6f, #f29263) */
            background: linear-gradient(146deg, rgba(19, 7, 224, 1) 0%, rgba(255, 242, 18, 1) 35%, rgba(34, 9, 232, 1) 100%);
        }

        .user-profile {
            padding: 20px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 5px
        }

        h6 {
            font-size: 14px
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1.25rem
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }
    </style>
    <div class="offset-sm-2">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6 offset-md-3">
                <div class="widget-user-header">
                    <img src="<?= base_url('assets/gambar/icon/Untitled-1cc.png') ?>" height="75px">
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">

                    <div class="col-xl-8 col-lg-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="<?= base_url('assets/gambar/user/' . $users->img) ?>" class="img-circle elevation-3" height="100px" width="100px" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600"><?= $users->nama_users ?></h6>
                                        <p><?= $users->job ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?= $users->email ?></h6>
                                                <p class="m-b-10 f-w-600">Divisi</p>
                                                <?php if ($users->nama_divisi == "") { ?>
                                                    <br>
                                                <?php } else { ?>
                                                    <h6 class="text-muted f-w-400"><?= $users->nama_divisi ?></h6>
                                                <?php } ?>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <?php if ($users->no_hp == "") { ?>
                                                    <br>
                                                <?php } else { ?>
                                                    <h6 class="text-muted f-w-400"><?= $users->no_hp ?></h6>
                                                <?php } ?> <p class="m-b-10 f-w-600">Status</p>
                                                <?php if ($users->status_users == "") { ?>
                                                    <br>
                                                <?php } else { ?>
                                                    <h6 class="text-muted f-w-400"><?= $users->status_users ?></h6>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('HBD')) : ?>
    <script>
        swal.fire({
            title: "Ada yang Ulang Tahun Nih",
            imageUrl: "<?= base_url() ?>assets/gambar/user/<?= $this->session->userdata('img_hbd') ?>",
            imageWidth: 150,
            text: "Hari ini Ulang Tahun <?= $this->session->userdata('user_hbd') ?> loh ",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>
<!-- /.col -->