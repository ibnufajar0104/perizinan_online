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
                                <div class="row">
                                    <!-- Kolom pertama -->
                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Nomor Pendaftaran</div>
                                        <div class="value"><?= $r['tblizinpendaftaran_nomor'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Tanggal Pendaftaran</div>
                                        <div class="value"><?= $r['tgl_daftar'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Nama Izin</div>
                                        <div class="value"><?= $r['tblizin_nama'] ?></div>
                                    </div>

                                    <!-- Kolom kedua -->
                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Nama Permohonan</div>
                                        <div class="value"><?= $r['tblizinpermohonan_nama'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Tanggal Penetapan</div>
                                        <div class="value">
                                            <?php if ($r['tgl_penetapan']) : ?>
                                            <?= $r['tgl_penetapan'] ?>
                                            <?php else : ?>
                                            -
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Berlaku Sampai</div>
                                        <div class="value">
                                            <?php if ($r['berlaku_sampai']) : ?>
                                            <?= $r['berlaku_sampai'] ?>
                                            <?php else : ?>
                                            -
                                            <?php endif ?>
                                        </div>
                                    </div>

                                    <!-- Kolom ketiga -->
                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Nama Usaha/Tempat Bekerja</div>
                                        <div class="value"><?= $r['tblizinpendaftaran_usaha'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Alamat Usaha/Tempat Bekerja</div>
                                        <div class="value"><?= $r['tblizinpendaftaran_lokasiizin'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Kecamatan</div>
                                        <div class="value"><?= $r['tblkecamatan_nama'] ?></div>
                                    </div>

                                    <!-- Tambahan kolom untuk melanjutkan konten -->
                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Kelurahan</div>
                                        <div class="value"><?= $r['tblkelurahan_nama'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Keterangan</div>
                                        <div class="value"><?= $r['tblizinpendaftaran_keterangan'] ?></div>
                                    </div>

                                    <div class="col-md-4 col-12 mb-3">
                                        <div class="title">Dokumen Perizinan</div>
                                        <div class="value"><a class="btn btn-outline-primary" target="_blank"
                                                href="<?= $r['dokumen'] ?>">Download</a></div>
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