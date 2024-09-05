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
                $maintitle = "Halaman Profil";
                $title = "Profil";
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
                            <div class="card-header">

                                Form Profil
                            </div>
                            <form class="needs-validation form-profil" novalidate method="POST">
                                <input type="hidden" name="tblpemohon_id" value="<?= $this->session->tblpemohon_id ?>">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Pemohon</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblpemohon_nama" id="tblpemohon_nama" required
                                                    value="<?= $row['tblpemohon_nama'] ?>">
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nomor WA Aktif</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblpemohon_telpon" id="tblpemohon_telpon"
                                                    value="<?= $row['tblpemohon_telpon'] ?>" required>
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">NIK</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblpemohon_noidentitas" id="tblpemohon_noidentitas" required
                                                    value="<?= $row['tblpemohon_noidentitas'] ?>">
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">NPWP</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblpemohon_npwp" id="tblpemohon_npwp" required
                                                    value="<?= $row['tblpemohon_npwp'] ?>">
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Alamat</label>
                                                <textarea name="tblpemohon_alamat" id="tblpemohon_alamat"
                                                    class="form-control" rows="4"
                                                    required><?= $row['tblpemohon_alamat'] ?></textarea>
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Email Aktif</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblpemohon_email" id="tblpemohon_email" required
                                                    value="<?= $row['tblpemohon_email'] ?>">
                                                <div class="invalid-feedback">
                                                    Harus diisi.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include(APPPATH . 'views/layout/footer.php'); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include(APPPATH . 'views/layout/js.php'); ?>