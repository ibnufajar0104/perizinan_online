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

                            <form class="form-profil" method="POST">
                                <input type="hidden" name="tblpemohon_id" value="<?= $this->session->tblpemohon_id ?>">
                                <div class="card-body">
                                    <div class="row p-md-2">

                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">Nama Pemohon</label>
                                                <input type="text" class="form-control " name="tblpemohon_nama"
                                                    id="tblpemohon_nama" required
                                                    value="<?= $row['tblpemohon_nama'] ?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">Nomor WA</label>
                                                <input type="text" class="form-control " name="tblpemohon_telpon"
                                                    id="tblpemohon_telpon" value="<?= $row['tblpemohon_telpon'] ?>"
                                                    required>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">NIK</label>
                                                <input type="text" class="form-control " name="tblpemohon_noidentitas"
                                                    id="tblpemohon_noidentitas" required
                                                    value="<?= $row['tblpemohon_noidentitas'] ?>">

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">NPWP</label>
                                                <input type="text" class="form-control " name="tblpemohon_npwp"
                                                    id="tblpemohon_npwp" required
                                                    value="<?= $row['tblpemohon_npwp'] ?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">Alamat</label>
                                                <textarea name="tblpemohon_alamat" id="tblpemohon_alamat"
                                                    class="form-control" rows="4"
                                                    required><?= $row['tblpemohon_alamat'] ?></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 py-2 px-4">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control " name="tblpemohon_email"
                                                    id="tblpemohon_email" required
                                                    value="<?= $row['tblpemohon_email'] ?>">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2"
                                        type="submit">Simpan <i class="mdi mdi-check-bold"></i></button>
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