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
                        <div class="card">

                            <div class="card-body">


                                <div class="row">


                                    <div class="col-md-6">
                                        <table class="table table-borderless">

                                            <tr>
                                                <td width="180">Nomor Pendaftaran</td>
                                                <td width="20">:</td>
                                                <td><?= $r['tblizinpendaftaran_nomor'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Pendaftaran</td>
                                                <td>:</td>
                                                <td><?= $r['tgl_daftar'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Izin</td>
                                                <td>:</td>
                                                <td><?= $r['tblizin_nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Permohonan</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpermohonan_nama'] ?></td>
                                            </tr>


                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_keterangan'] ?></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <table class="table table-borderless">

                                            <tr>
                                                <td width="200">Nama Usaha</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_usaha'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi Usaha / Bangunan</td>
                                                <td>:</td>

                                                <td><?= $r['tblizinpendaftaran_lokasiizin'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkecamatan_nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkelurahan_nama'] ?></td>
                                            </tr>


                                        </table>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td width="180">Tanggal Penetapan</td>
                                                    <td width="20">:</td>
                                                    <td>
                                                        <?php if ($r['tgl_penetapan']) : ?>
                                                        <?= $r['tgl_penetapan'] ?>
                                                        <?php else : ?>
                                                        -
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Berlaku Sampai</td>
                                                    <td>:</td>
                                                    <td>

                                                        <?php if ($r['berlaku_sampai']) : ?>
                                                        <?= $r['berlaku_sampai'] ?>
                                                        <?php else : ?>
                                                        -
                                                        <?php endif ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Dokumen Perizinan</td>
                                                    <td>:</td>
                                                    <td>

                                                        <?php if ($r['sesudah_tte']) : ?>
                                                        <a href="<?= $r['sesudah_tte'] ?>" target="_blank">Download</a>
                                                        <?php else : ?>
                                                        -
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <?php endforeach ?>
                <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

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