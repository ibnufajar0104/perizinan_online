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
                                        <a class="nav-link informasi-umum-tab" data-bs-toggle="tab" href="#home-1"
                                            role="tab"
                                            onclick="window.location.href='<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>'; return false;">
                                            1. Informasi Umum
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active berkas-persyaratan-tab" data-bs-toggle="tab"
                                            href="#profile-1" role="tab">
                                            2. Berkas Persyaratan
                                            <i class="fas fa-file-alt"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link resume-tab" data-bs-toggle="tab" href="#messages-1"
                                            role="tab">
                                            3. Resume
                                            <i class="fas fa-check-circle"></i>
                                        </a>
                                    </li>

                                </ul>
                                <!-- Tab panes -->
                                <!-- mobile menu -->
                                <div class="mobile-menu d-md-none">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#home-1" role="tab"
                                                onclick="window.location.href='<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>'; return false;">
                                                <i class="fas fa-info-circle"></i>
                                                <span>Informasi Umum</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile-1" role="tab">
                                                <i class="fas fa-file-alt"></i>
                                                <span>Berkas Persyaratan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link resume-tab" href="#messages-1" role="tab"
                                                data-bs-toggle="tab">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Resume</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content p-md-2">
                                    <div class="tab-pane " id="home-1" role="tabpanel">

                                    </div>
                                    <div class="tab-pane active" id="profile-1" role="tabpanel">
                                        <form class="berkas-persyaratan mt-0 mt-md-4" method="POST">
                                            <input type="hidden" name="idPendaftaran" id="idPendaftaran"
                                                value="<?= $idPendaftaran ?>">
                                            <input type="hidden" name="idPermohonan" id="idPermohonan"
                                                value="<?= $idPermohonan ?>">
                                            <input type="hidden" name="idPemohon" id="idPemohon"
                                                value="<?= $idPemohon ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php foreach ($row as $r) : ?>
                                                    <div class="row mb-3 border-bottom px-0 px-md-4 pb-3">
                                                        <div class="col-md-6 col-sm-12 mb-2">
                                                            <div class="text-wrap">

                                                                <?= $r['tblpersyaratan_nama'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12 mb-2">
                                                            <div>
                                                                <strong>Format:</strong> <?= $r['format'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12">
                                                            <div class="d-flex flex-column">

                                                                <!-- Input file yang disembunyikan -->
                                                                <input type="file" name="<?= $r['tblpersyaratan_id'] ?>"
                                                                    id="<?= $r['tblpersyaratan_id'] ?>"
                                                                    style="display: none;">

                                                                <!-- Tombol Upload -->
                                                                <button type="button"
                                                                    class="btn btn-sm btn-rounded mb-2 btn-primary upload"
                                                                    onclick="upload('<?= $r['tblpersyaratan_id'] ?>')">
                                                                    <i class="fadeIn animated  bx bx-upload"></i>
                                                                    Upload</button>

                                                                <!-- Tombol Review -->
                                                                <button type="button"
                                                                    class="btn btn-sm btn-rounded mb-2 btn-warning  review <?= $r['tblpersyaratan_id'] ?>"
                                                                    onclick="review_after_upload('<?= $r['tblpersyaratan_id'] ?>')"
                                                                    style="display: none;"> <i
                                                                        class="fadeIn animated  bx bx-eye"></i>
                                                                    Review</button>

                                                                <!-- Progress Bar -->
                                                                <div class="progress mb-2 " style="display: none;"
                                                                    id="progress-container-<?= $r['tblpersyaratan_id'] ?>">
                                                                    <div id="progress-bar-<?= $r['tblpersyaratan_id'] ?>"
                                                                        class="progress-bar" role="progressbar"
                                                                        style="width: 0%;" aria-valuenow="0"
                                                                        aria-valuemin="0" aria-valuemax="100">0%
                                                                    </div>
                                                                </div>

                                                                <?php if (isset($r['file'])) : ?>
                                                                <button type="button"
                                                                    onclick="review('<?= path_persyaratan($r['file']) ?>')"
                                                                    class="btn btn-success btn-sm btn-rounded mb-2 review">
                                                                    <i class="fadeIn animated bx bx-file"></i>
                                                                    File anda sebelumnya
                                                                </button>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="float-start">
                                                        <a class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                                            href="<?= site_url('permohonan/informasiUmum/' . $idPendaftaran) ?>"><i
                                                                class="mdi mdi-arrow-left"></i>Sebelumnya</a>
                                                    </div>
                                                    <div class="float-end">
                                                        <button
                                                            class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                                            type="submit">Selanjutnya <i
                                                                class="mdi mdi-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">

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