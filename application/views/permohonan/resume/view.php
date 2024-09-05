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
                $title = "Form Permohonan";
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link mb-2" id="v-pills-home-tab"
                                                onclick="window.location.href='<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>'; return false;"
                                                role="tab" aria-controls="v-pills-home" aria-selected="false">1.
                                                Informasi Umum</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab"
                                                onclick="window.location.href='<?= site_url('permohonan/berkasPersyaratan/' . $idPendaftaran) ?>'; return false;"
                                                data-bs-toggle="pill" href="#v-pills-profile" role="tab"
                                                aria-controls="v-pills-profile" aria-selected="true">2. Berkas
                                                Persyaratan</a>
                                            <a class="nav-link mb-2 active" id="v-pills-messages-tab"
                                                data-bs-toggle="pill" href="#v-pills-messages" role="tab"
                                                aria-controls="v-pills-messages" aria-selected="false">3. Resume</a>
                                        </div>
                                    </div>


                                    <!-- end col -->
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                                aria-labelledby="v-pills-home-tab">

                                            </div>
                                            <div class="tab-pane fade " id="v-pills-profile" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">

                                            </div>
                                            <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel"
                                                aria-labelledby="v-pills-messages-tab">
                                                <div class="row gy-4">
                                                    <!-- Informasi Pemohon -->
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="mb-3">
                                                            <p class="title">Nomor Pendaftaran</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_nomor'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Nomor Identitas</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_idpemohon'] ?>
                                                            </p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Nomor NPWP</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_npwp'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Nama Pemohon</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_namapemohon'] ?>
                                                            </p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">No. Telepon</p>
                                                            <p class="value">
                                                                <?= $r['tblizinpendaftaran_telponpemohon'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Alamat</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_almtpemohon'] ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Informasi Permohonan Izin -->
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="mb-3">
                                                            <p class="title">Nama Izin</p>
                                                            <p class="value"><?= $r['tblizin_nama'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Nama Permohonan</p>
                                                            <p class="value"><?= $r['tblizinpermohonan_nama'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Tanggal Permohonan</p>
                                                            <p class="value"><?= $r['tgl_daftar'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Keterangan</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_keterangan'] ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Informasi Usaha/Tempat Kerja -->
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="mb-3">
                                                            <p class="title">Nama Usaha/Tempat Berkerja</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_usaha'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <p class="title">Alamat Usaha/Tempat Berkerja</p>
                                                            <p class="value"><?= $r['tblizinpendaftaran_lokasiizin'] ?>
                                                            </p>
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
                                                </div>
                                            </div>

                                        </div>
                                    </div><!--  end col -->
                                </div><!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>





            </div><!-- end card -->
            <!-- end row -->
        </div> <!-- container-fluid -->
        <?php include(APPPATH . 'views/permohonan/modal.php'); ?>
    </div>
    <!-- End Page-content -->

    <?php include(APPPATH . 'views/layout/footer.php'); ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?php include(APPPATH . 'views/layout/js.php'); ?>