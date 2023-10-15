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

                                Pengajuan Permohonan
                            </div>

                            <div class="card-body">
                                <form class="needs-validation" novalidate
                                    action="<?= site_url('permohonan/pendaftaran') ?>" method="POST">
                                    <div class="row">
                                        <input type="hidden" name="tblpemohon_id" id="tblpemohon_id"
                                            value="<?= $this->session->tblpemohon_id ?>">
                                        <input type="hidden" name="tblpengguna_id" id="tblpengguna_id"
                                            value="<?= $this->session->id ?>">
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nomor Identitas</label>
                                                <input type="number" class="form-control"
                                                    name="tblizinpendaftaran_idpemohon"
                                                    id="tblizinpendaftaran_idpemohon"
                                                    value="<?= $this->session->no_identitas ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Pemohon</label>
                                                <input type="text" class="form-control"
                                                    name="tblizinpendaftaran_namapemohon"
                                                    id="tblizinpendaftaran_namapemohon"
                                                    value="<?= $this->session->nama ?>" required>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Alamat</label>
                                                <textarea name="tblizinpendaftaran_almtpemohon"
                                                    id="tblizinpendaftaran_almtpemohon" class="form-control" rows="2"
                                                    required><?= $this->session->alamat ?> </textarea>
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nomor NPWP</label>
                                                <input type="number" class="form-control" name="tblizinpendaftaran_npwp"
                                                    id="tblizinpendaftaran_npwp" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nomor Telepon</label>
                                                <input type="tel" class="form-control"
                                                    name="tblizinpendaftaran_telponpemohon"
                                                    id="tblizinpendaftaran_telponpemohon" required
                                                    value="<?= $this->session->telepon ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Izin</label>
                                                <select name="tblizin_id" id="tblizin_id"
                                                    class="form-control single-select" required>
                                                    <option value="">Pilih</option>
                                                    <?php foreach ($izin as $r) : ?>
                                                    <option value="<?= $r['tblizin_id'] ?>"><?= $r['tblizin_nama'] ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Permohonan</label>
                                                <select name="tblizinpermohonan_id" id="tblizinpermohonan_id"
                                                    class="form-control single-select" required>
                                                    <option value="">Pilih</option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Usaha</label>
                                                <input type="text" class="form-control" name="tblizinpendaftaran_usaha"
                                                    id="tblizinpendaftaran_usaha" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Lokasi Usaha / Bangunan</label>
                                                <input type="text" class="form-control"
                                                    name="tblizinpendaftaran_lokasiizin"
                                                    id="tblizinpendaftaran_lokasiizin" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Kecamatan </label>
                                                <select name="tblkecamatan_id" id="tblkecamatan_id"
                                                    class="form-control single-select" required>
                                                    <option value=""></option>
                                                    <?php foreach ($kecamatan as $r) : ?>
                                                    <option value="<?= $r['tblkecamatan_id'] ?>">
                                                        <?= $r['tblkecamatan_nama'] ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Nama Kelurahan / Desa</label>
                                                <select name="tblkelurahan_id" id="tblkelurahan_id"
                                                    class="form-control single-select" required>
                                                    <option value=""></option>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-12 mb-4">
                                            <div class="form-group">
                                                <label for="" class="mb-1">Keterangan</label>
                                                <textarea name="tblizinpendaftaran_keterangan"
                                                    id="tblizinpendaftaran_keterangan" class="form-control" rows="2"
                                                    required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row persyaratan">

                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                </div>
                <!-- end row -->






            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © Dason.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="#!" class="text-decoration-underline">Themesdesign</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?php include(APPPATH . 'views/layout/footer.php'); ?>