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
                                        <a class="nav-link active informasi-umum-tab" data-bs-toggle="tab"
                                            href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">1. Informasi Umum</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link berkas-persyaratan-tab" data-bs-toggle="tab"
                                            href="#profile-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">2. Berkas Persyaratan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link resume-tab" data-bs-toggle="tab" href="#messages-1"
                                            role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">3. Resume</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- mobile menu -->
                                <div class="mobile-menu d-md-none">
                                    <ul class="nav nav-pills nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active informasi-umum-tab" data-bs-toggle="tab"
                                                href="#home-1" role="tab">
                                                <i class="fas fa-info-circle"></i>
                                                <span>Informasi Umum</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link berkas-persyaratan-tab" data-bs-toggle="tab"
                                                href="#profile-1" role="tab">
                                                <i class="fas fa-file-alt"></i>
                                                <span>Berkas Persyaratan</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link resume-tab" data-bs-toggle="tab" href="#messages-1"
                                                role="tab">
                                                <i class="fas fa-check-circle"></i>
                                                <span>Resume</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tab panes -->
                                <div class="tab-content p-md-4">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <form class="informasi-umum" method="POST">
                                            <input type="hidden" name="tblizinpendaftaran_id"
                                                value="<?= $idPendaftaran ?>" id="tblizinpendaftaran_id">
                                            <div class="row">

                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="form-label mb-1">Nama Izin</label>
                                                        <select name="tblizin_id" id="tblizin_id"
                                                            class="form-control form-control-2 select2" required
                                                            style="height: 50%">
                                                            <option value="">Pilih</option>
                                                            <?php foreach ($izin as $r) : ?>
                                                                <option value="<?= $r['tblizin_id'] ?>">
                                                                    <?= $r['tblizin_nama'] ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="mb-1 form-label">Nama Permohonan</label>
                                                        <select name="tblizinpermohonan_id" id="tblizinpermohonan_id"
                                                            class="form-control form-control-2 select2" required>
                                                            <option value="">Pilih</option>

                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="mb-1 form-label nama_usaha">Nama Usaha/Tempat
                                                            Berkerja</label>
                                                        <input type="text" class="form-control form-control-2"
                                                            name="tblizinpendaftaran_usaha"
                                                            id="tblizinpendaftaran_usaha" required>

                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="mb-1 form-label alamat_usaha">Alamat
                                                            Usaha/Tempat
                                                            Berkerja</label>
                                                        <input type="text" class="form-control form-control-2"
                                                            name="tblizinpendaftaran_lokasiizin"
                                                            id="tblizinpendaftaran_lokasiizin" required>

                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="form-label mb-1">Nama Kecamatan </label>
                                                        <select name="tblkecamatan_id" id="tblkecamatan_id"
                                                            class="form-control form-control-2 select2" required>
                                                            <option value="">Pilih</option>
                                                            <?php foreach ($kecamatan as $r) : ?>
                                                                <option value="<?= $r['tblkecamatan_id'] ?>">
                                                                    <?= $r['tblkecamatan_nama'] ?>
                                                                </option>
                                                            <?php endforeach ?>
                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="form-label mb-1">Nama Kelurahan /
                                                            Desa</label>
                                                        <select name="tblkelurahan_id" id="tblkelurahan_id"
                                                            class="form-control form-control-2 select select2" required>
                                                            <option value="">Pilih</option>

                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="col-md-6 col-12  px-2 px-md-4 pb-4">
                                                    <div class="form-group">
                                                        <label class="form-label mb-1">Keterangan</label>
                                                        <textarea name="tblizinpendaftaran_keterangan"
                                                            id="tblizinpendaftaran_keterangan" class="form-control"
                                                            rows="4"></textarea>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="float-end">
                                                        <a class="btn btn-outline-danger"
                                                            href="<?= site_url('permohonan') ?>">Batal</a>

                                                        <button class="btn btn-primary" type="submit">Lanjut</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="profile-1" role="tabpanel">

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
    <!-- End Page-content -->

    <?php include(APPPATH . 'views/layout/footer.php'); ?>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?php include(APPPATH . 'views/layout/js.php'); ?>