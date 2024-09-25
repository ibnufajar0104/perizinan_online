<?php include(APPPATH . 'views/layout/head.php'); ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include(APPPATH . 'views/layout/topbar.php'); ?>
    <?php include(APPPATH . 'views/layout/menu.php'); ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Permohonan";
                $title = "Riwayat Permohonan";
                ?>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $title; ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="javascript: void(0);"><?php echo $maintitle; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?php if ($riwayat) : ?>


                <?php foreach ($riwayat as $r) : ?>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="row gy-4">
                                    <!-- Informasi Pendaftaran -->
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <p class="title">Nomor Pendaftaran</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_nomor'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Tanggal Pendaftaran</p>
                                            <p class="value"><?= $r['tgl_daftar'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Izin</p>
                                            <p class="value"><?= $r['tblizin_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Permohonan</p>
                                            <p class="value"><?= $r['tblizinpermohonan_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Keterangan</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_keterangan'] ?></p>
                                        </div>

                                    </div>

                                    <!-- Informasi Usaha/Tempat Kerja -->
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <p class="title">Nama Usaha/Tempat Bekerja</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_usaha'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Alamat Usaha/Tempat Bekerja</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_lokasiizin'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Kecamatan</p>
                                            <p class="value"><?= $r['tblkecamatan_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Kelurahan</p>
                                            <p class="value"><?= $r['tblkelurahan_nama'] ?></p>
                                        </div>

                                    </div>
                                    <!-- Informasi Permohonan -->
                                    <div class="col-md-4 col-12">

                                        <div class="mb-3">
                                            <p class="title">Tanggal Penetapan</p>
                                            <p class="value">
                                                <?php if ($r['tgl_penetapan']) : ?>
                                                <?= $r['tgl_penetapan'] ?>
                                                <?php else : ?>
                                                -
                                                <?php endif ?>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Berlaku Sampai</p>
                                            <p class="value">
                                                <?php if ($r['berlaku_sampai']) : ?>
                                                <?= $r['berlaku_sampai'] ?>
                                                <?php else : ?>
                                                -
                                                <?php endif ?>
                                            </p>
                                        </div>

                                        <div class="mb-3">
                                            <p class="title">Dokumen Digital</p>
                                            <p class="value"><a class="btn btn-outline-primary" target="_blank"
                                                    href="<?= $r['dokumen'] ?>">Download</a></p>
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>




                <?php endforeach ?>
                <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-3 shadow-sm">

                            <div class="card-body">


                                <div class="row">

                                    <div class="col-md-12 text-center">
                                        <p>Belum ada riwayat permohonan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <?php endif ?>
                <!-- end row -->






            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include(APPPATH . 'views/layout/footer.php'); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include(APPPATH . 'views/layout/js.php'); ?>