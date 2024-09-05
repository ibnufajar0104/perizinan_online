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
                                            <a class="nav-link mb-2 active" id="v-pills-profile-tab"
                                                data-bs-toggle="pill" href="#v-pills-profile" role="tab"
                                                aria-controls="v-pills-profile" aria-selected="true">2. Berkas
                                                Persyaratan</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                                aria-selected="false">3. Resume</a>
                                        </div>
                                    </div>


                                    <!-- end col -->
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                                aria-labelledby="v-pills-home-tab">

                                            </div>
                                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">
                                                <form class="berkas-persyaratan" method="POST">
                                                    <input type="hidden" name="idPendaftaran" id="idPendaftaran"
                                                        value="<?= $idPendaftaran ?>">
                                                    <input type="hidden" name="idPermohonan" id="idPermohonan"
                                                        value="<?= $idPermohonan ?>">
                                                    <input type="hidden" name="idPemohon" id="idPemohon"
                                                        value="<?= $idPemohon ?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php foreach ($row as $r) : ?>
                                                            <div class="row mb-3 border-bottom pb-2">
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
                                                                <div class="col-md-3 col-sm-12 mb-2">
                                                                    <div class="d-flex flex-column">

                                                                        <!-- Input file yang disembunyikan -->
                                                                        <input type="file"
                                                                            name="<?= $r['tblpersyaratan_id'] ?>"
                                                                            id="<?= $r['tblpersyaratan_id'] ?>"
                                                                            style="display: none;">

                                                                        <!-- Tombol Upload -->
                                                                        <button type="button"
                                                                            class="btn btn-sm mb-2 btn-primary upload"
                                                                            onclick="upload('<?= $r['tblpersyaratan_id'] ?>')">Upload</button>

                                                                        <!-- Tombol Review -->
                                                                        <button type="button"
                                                                            class="btn btn-sm mb-2 btn-warning review <?= $r['tblpersyaratan_id'] ?>"
                                                                            onclick="review_after_upload('<?= $r['tblpersyaratan_id'] ?>')"
                                                                            style="display: none;">Review</button>

                                                                        <!-- Progress Bar -->
                                                                        <div class="progress mt-2 mb-2">
                                                                            <div id="progress-bar-<?= $r['tblpersyaratan_id'] ?>"
                                                                                class="progress-bar" role="progressbar"
                                                                                style="width: 0%;" aria-valuenow="0"
                                                                                aria-valuemin="0" aria-valuemax="100">0%
                                                                            </div>
                                                                        </div>

                                                                        <?php if (isset($r['file'])) : ?>
                                                                        <button type="button"
                                                                            onclick="review('<?= path_persyaratan($r['file']) ?>')"
                                                                            class="btn btn-success btn-sm mb-2 review">
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
                                                            <div class="float-end">
                                                                <a class="btn btn-outline-danger"
                                                                    href="<?= site_url('permohonan') ?>">Batal</a>

                                                                <button class="btn btn-primary"
                                                                    type="submit">Lanjut</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                                aria-labelledby="v-pills-messages-tab">

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