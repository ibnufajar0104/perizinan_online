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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">

                                Edit Permohonan
                            </div>
                            <form class="needs-validation form-update" novalidate method="POST"
                                enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="row">
                                        <input type="hidden" name="tblizinpendaftaran_id"
                                            value="<?= $p['tblizinpendaftaran_id'] ?>" id="tblizinpendaftaran_id">
                                        <input type="hidden" name="tblpemohon_id" id="tblpemohon_id"
                                            value="<?= $p['tblpemohon_id'] ?>">
                                        <input type="hidden" name="tblpengguna_id" id="tblpengguna_id"
                                            value="<?= $p['tblpengguna_id'] ?>">
                                        <input type="hidden" name="tblizinpendaftaran_idpemohon"
                                            id="tblizinpendaftaran_idpemohon"
                                            value="<?= $p['tblizinpendaftaran_idpemohon'] ?>" required>
                                        <input type="hidden" name="tblizinpendaftaran_namapemohon"
                                            id="tblizinpendaftaran_namapemohon"
                                            value="<?= $p['tblizinpendaftaran_namapemohon'] ?>" required>

                                        <input type="hidden" name="tblizinpendaftaran_almtpemohon"
                                            id="tblizinpendaftaran_almtpemohon"
                                            value="<?= $p['tblizinpendaftaran_almtpemohon'] ?>" required>


                                        <input type="hidden" name="tblizinpendaftaran_npwp" id="tblizinpendaftaran_npwp"
                                            value="<?= $p['tblizinpendaftaran_npwp'] ?>" required>

                                        <input type="hidden" name="tblizinpendaftaran_telponpemohon"
                                            id="tblizinpendaftaran_telponpemohon" required
                                            value="<?= $p['tblizinpendaftaran_telponpemohon'] ?>">


                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Izin</label>
                                                <select name="tblizin_id" id="tblizin_id"
                                                    class="form-control form-control-2 select" required>
                                                    <option value="">Pilih</option>
                                                    <?php foreach ($izin as $r) : ?>
                                                    <option <?= selected($r['tblizin_id'], $p['tblizin_id']) ?>
                                                        value="<?= $r['tblizin_id'] ?>"><?= $r['tblizin_nama'] ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Permohonan</label>
                                                <select name="tblizinpermohonan_id" id="tblizinpermohonan_id"
                                                    class="form-control form-control-2 select" required>
                                                    <option value="">Pilih</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1 nama_usaha">Nama Usaha/Tempat Berkerja</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblizinpendaftaran_usaha" id="tblizinpendaftaran_usaha"
                                                    value="<?= $p['tblizinpendaftaran_usaha'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1 alamat_usaha">Alamat Usaha/Tempat
                                                    Berkerja</label>
                                                <input type="text" class="form-control form-control-2"
                                                    name="tblizinpendaftaran_lokasiizin"
                                                    id="tblizinpendaftaran_lokasiizin"
                                                    value="<?= $p['tblizinpendaftaran_lokasiizin'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Kecamatan </label>
                                                <select name="tblkecamatan_id" id="tblkecamatan_id"
                                                    class="form-control form-control-2 select" required>
                                                    <option value="">Pilih</option>
                                                    <?php foreach ($kecamatan as $r) : ?>
                                                    <option
                                                        <?= selected($r['tblkecamatan_id'], $p['tblkecamatan_id']) ?>
                                                        value="<?= $r['tblkecamatan_id'] ?>">
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
                                                    class="form-control form-control-2 select" required>
                                                    <option value="">Pilih</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 px-4 pb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Keterangan</label>
                                                <textarea name="tblizinpendaftaran_keterangan"
                                                    id="tblizinpendaftaran_keterangan" class="form-control"
                                                    rows="4"><?= $p['tblizinpendaftaran_keterangan'] ?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row persyaratan">

                                    </div>

                                    <div class="float-sm-end">

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-outline-danger " href="<?= site_url('permohonan') ?>">Batal</a>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>


                        <!-- end card -->
                    </div> <!-- end col -->

                </div>
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