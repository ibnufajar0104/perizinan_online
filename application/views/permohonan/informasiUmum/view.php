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
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                                aria-selected="true">1. Informasi Umum</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">2. Berkas Persyaratan</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                                aria-selected="false">3. Resume</a>
                                        </div>
                                    </div>


                                    <!-- end col -->
                                    <div class="col-md-9">
                                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                aria-labelledby="v-pills-home-tab">
                                                <form class="informasi-umum" method="POST">
                                                    <input type="hidden" name="tblizinpendaftaran_id"
                                                        value="<?= $idPendaftaran ?>" id="tblizinpendaftaran_id">
                                                    <div class="row">

                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1">Nama Izin</label>
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
                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1 ">Nama Permohonan</label>
                                                                <select name="tblizinpermohonan_id"
                                                                    id="tblizinpermohonan_id"
                                                                    class="form-control form-control-2 select2"
                                                                    required>
                                                                    <option value="">Pilih</option>

                                                                </select>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1 nama_usaha">Nama Usaha/Tempat
                                                                    Berkerja</label>
                                                                <input type="text" class="form-control form-control-2"
                                                                    name="tblizinpendaftaran_usaha"
                                                                    id="tblizinpendaftaran_usaha" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1 alamat_usaha">Alamat
                                                                    Usaha/Tempat
                                                                    Berkerja</label>
                                                                <input type="text" class="form-control form-control-2"
                                                                    name="tblizinpendaftaran_lokasiizin"
                                                                    id="tblizinpendaftaran_lokasiizin" required>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1">Nama Kecamatan </label>
                                                                <select name="tblkecamatan_id" id="tblkecamatan_id"
                                                                    class="form-control form-control-2 select2"
                                                                    required>
                                                                    <option value="">Pilih</option>
                                                                    <?php foreach ($kecamatan as $r) : ?>
                                                                        <option value="<?= $r['tblkecamatan_id'] ?>">
                                                                            <?= $r['tblkecamatan_nama'] ?>
                                                                        </option>
                                                                    <?php endforeach ?>
                                                                </select>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1">Nama Kelurahan / Desa</label>
                                                                <select name="tblkelurahan_id" id="tblkelurahan_id"
                                                                    class="form-control form-control-2 select select2"
                                                                    required>
                                                                    <option value="">Pilih</option>

                                                                </select>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 col-12 px-4 pb-4">
                                                            <div class="form-group">
                                                                <label for="" class="mb-1">Keterangan</label>
                                                                <textarea name="tblizinpendaftaran_keterangan"
                                                                    id="tblizinpendaftaran_keterangan"
                                                                    class="form-control" rows="4"></textarea>

                                                            </div>
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
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                aria-labelledby="v-pills-profile-tab">

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