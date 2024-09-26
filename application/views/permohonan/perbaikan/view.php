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
                                <div class="row px-md-4">
                                    <div class="alert alert-danger" role="alert">
                                        <h4 class="alert-heading">Perhatian !</h4>
                                        <p>Catatan : <?= $catatan ?></p>
                                    </div>
                                    <form class="berkas-persyaratan" method="POST">
                                        <input type="hidden" name="idPendaftaran" id="idPendaftaran"
                                            value="<?= $idPendaftaran ?>">

                                        <?php foreach ($rows as $r) : ?>
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
                                                <!-- <div class="d-flex flex-column"> -->

                                                <!-- Input file yang disembunyikan -->
                                                <input type="file" name="<?= $r['tblpersyaratan_id'] ?>"
                                                    id="<?= $r['tblpersyaratan_id'] ?>" style="display: none;">

                                                <!-- Tombol Upload -->
                                                <button type="button"
                                                    class="btn btn-sm btn-rounded btn-secondary upload mb-2 mb-md-0"
                                                    onclick="upload('<?= $r['tblpersyaratan_id'] ?>')">
                                                    <i class="fadeIn animated  bx bx-upload"></i>
                                                    Upload</button>




                                                <?php if (isset($r['file'])) : ?>
                                                <button type="button"
                                                    onclick="review('<?= path_persyaratan($r['file']) ?>')"
                                                    class="btn btn-success btn-sm btn-rounded review mb-2 mb-md-0">
                                                    <i class="fadeIn animated bx bx-file"></i>
                                                    File anda sebelumnya
                                                </button>
                                                <?php endif ?>

                                                <!-- Tombol Review -->
                                                <button type="button"
                                                    class="btn btn-sm btn-rounded btn-warning review <?= $r['tblpersyaratan_id'] ?> mb-2 mb-md-0"
                                                    onclick="review_after_upload('<?= $r['tblpersyaratan_id'] ?>')"
                                                    style="display: none;"> <i
                                                        class="fadeIn animated bx bxs-detail"></i>
                                                    Review</button>

                                                <!-- Progress Bar -->
                                                <div class="progress mb-2 mb-md-0" style="display: none;"
                                                    id="progress-container-<?= $r['tblpersyaratan_id'] ?>">
                                                    <div id="progress-bar-<?= $r['tblpersyaratan_id'] ?>"
                                                        class="progress-bar" role="progressbar" style="width: 0%;"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%
                                                    </div>
                                                </div>
                                                <!-- </div> -->

                                            </div>
                                        </div>
                                        <?php endforeach ?>



                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="float-start">
                                                    <a class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"
                                                        href="<?= site_url('permohonan') ?>"><i
                                                            class="mdi mdi-close"></i> Batal</a>
                                                </div>
                                                <div class="float-end">
                                                    <button
                                                        class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                                        type="submit"><i class="mdi mdi-circle-edit-outline"></i>
                                                        Perbaiki</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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