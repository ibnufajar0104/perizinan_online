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
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified d-none d-md-flex" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" id="informasi-umum-tab-desktop" href="#home-1" role="tab"
                                            onclick="window.location.href='<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>'; return false;">
                                            1. Informasi Umum
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" id="berkas-persyaratan-tab-desktop" href="#profile-1"
                                            role="tab"
                                            onclick="window.location.href='<?= site_url('permohonan/berkasPersyaratan/' . $idPendaftaran) ?>'; return false;">
                                            2. Berkas Persyaratan
                                            <i class="fas fa-file-alt"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" id="resume-tab-desktop" href="#messages-1"
                                            role="tab">
                                            3. Resume
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    </li>
                                </ul>


                                <!-- mobile menu -->

                                <div class="mobile-menu d-md-none">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="informasi-umum-tab-mobile" href="#home-1" role="tab"
                                                onclick="window.location.href='<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>'; return false;">
                                                <i class="fas fa-info-circle"></i>
                                                <span>Informasi Umum</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="berkas-persyaratan-tab-mobile" href="#profile-1"
                                                role="tab"
                                                onclick="window.location.href='<?= site_url('permohonan/berkasPersyaratan/' . $idPendaftaran) ?>'; return false;">
                                                <i class="fas fa-file-alt"></i>
                                                <span>Berkas Persyaratan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="resume-tab-mobile" href="#messages-1"
                                                role="tab">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Resume</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <!-- Tab panes -->
                                <div class="tab-content px-md-3">
                                    <div class="tab-pane " id="home-1" role="tabpanel">

                                    </div>
                                    <div class="tab-pane " id="profile-1" role="tabpanel">

                                    </div>
                                    <div class="tab-pane active" id="messages-1" role="tabpanel">
                                        <h5>Informasi Umum</h5>
                                        <hr>
                                        <div class="row gy-4 p-md-4">
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
                                                    <p class="title">NPWP</p>
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
                                        <h5 class="mt-4">Berkas Persyaratan</h5>
                                        <hr>
                                        <?php foreach ($row as $r) : ?>
                                            <div class="row border-bottom py-4 px-md-4">
                                                <div class="col-md-6 col-sm-12 mb-2 mb-md-0">
                                                    <div class="text-wrap">

                                                        <?= $r['tblpersyaratan_nama'] ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12 mb-2 mb-md-0">
                                                    <div>
                                                        <strong>Format:</strong> <?= $r['format'] ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12">

                                                    <?php if (isset($r['file'])) : ?>
                                                        <button type="button"
                                                            onclick="review('<?= path_persyaratan($r['file']) ?>')"
                                                            class="btn btn-success btn-rounded btn-sm review mb-2 mb-md-0">
                                                            <i class="fadeIn animated bx bx-file"></i>
                                                            Lihat file
                                                        </button>
                                                    <?php endif ?>

                                                </div>
                                            </div>
                                        <?php endforeach ?>

                                        <div class="row mt-4 px-2">
                                            <div class="col-12">
                                                <div class="alert alert-warning mt-md-4 mb-4" role="alert">
                                                    <h4 class="alert-heading">Perhatian!</h4>
                                                    <p>1. Periksa terlebih dahulu Informasi Umum dan Berkas Persyaratan
                                                        anda apakah sudah benar
                                                        ?</p>
                                                    <hr>
                                                    <p class="mb-0">2. Anda masih dapat mengedit Informasi Umum dan
                                                        Berkas Persyaratan sebelum permohonan diajukan
                                                    </p>
                                                    <hr>
                                                    <p class="mb-0">3. Data diri seperti Nomor Identitas, NPWP, Telepon,
                                                        Email, dll, dapat diedit di menu profil atau, klik <a
                                                            href="<?= site_url('profil') ?>">disini</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-auto">
                                                <div class="form-check justify-content-center align-items-center">
                                                    <input class="form-check-input" type="checkbox" id="pernyataan">
                                                    <label class="form-check-label" for="pernyataan">
                                                        <i>Semua informasi yang Saya masukkan adalah benar dan dapat
                                                            dipertanggungjawabkan</i>
                                                    </label>
                                                    <p class="text-danger hide" id="warning-msg">Pernyataan harus
                                                        dicentang</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="float-start">
                                                    <a class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                                        href="<?= site_url('permohonan/berkasPersyaratan/' . $idPendaftaran) ?>"><i
                                                            class="mdi mdi-arrow-left"></i>Sebelumnya</a>
                                                </div>
                                                <div class="float-end">
                                                    <button
                                                        class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                                        type="submit" id="ajukan">Selanjutnya <i
                                                            class="mdi mdi-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>





            </div><!-- end card -->
            <!-- end row -->
        </div> <!-- container-fluid -->

    </div>
    <div class="modal fade bs-example-modal-center" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="form-resume" method="POST">
                        <input type="hidden" name="idPendaftaran" id="idPendaftaran" value="<?= $idPendaftaran ?>">
                        <input type="hidden" name="idPermohonan" id="idPermohonan" value="<?= $idPermohonan ?>">
                        <input type="hidden" name="idPemohon" id="idPemohon" value="<?= $idPemohon ?>">

                        <div class="row">
                            <div class="col-12">
                                <p>Apakah Anda yakin ingin mengajukan permohonan? Setelah diproses, data Anda tidak
                                    dapat diedit lagi. Mohon periksa terlebih dahulu <strong>Informasi Umum</strong> dan
                                    <strong>Berkas Persyaratan</strong>.
                                </p>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="float-end">
                                    <button class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                        type="submit">Yakin <i class="mdi mdi-check-bold"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="fileModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="fileContent">
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    <?php include(APPPATH . 'views/layout/footer.php'); ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?php include(APPPATH . 'views/layout/js.php'); ?>