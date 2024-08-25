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
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">1. Permohonan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">2. Berkas Persyaratan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">3. Resume</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">

                                        <div class="row">
                                            <input type="hidden" name="tblpemohon_id" id="tblpemohon_id"
                                                value="<?= $this->session->tblpemohon_id ?>">
                                            <input type="hidden" name="tblpengguna_id" id="tblpengguna_id"
                                                value="<?= $this->session->id ?>">
                                            <input type="hidden" name="tblizinpendaftaran_idpemohon"
                                                id="tblizinpendaftaran_idpemohon"
                                                value="<?= $row['tblpemohon_noidentitas'] ?>" required>
                                            <input type="hidden" name="tblizinpendaftaran_namapemohon"
                                                id="tblizinpendaftaran_namapemohon"
                                                value="<?= $row['tblpemohon_nama'] ?>" required>
                                            <input name="tblizinpendaftaran_almtpemohon" type="hidden"
                                                id="tblizinpendaftaran_almtpemohon" required
                                                value="<?= $row['tblpemohon_alamat'] ?>">
                                            <input type="hidden" name="tblizinpendaftaran_telponpemohon"
                                                id="tblizinpendaftaran_telponpemohon" required
                                                value="<?= $row['tblpemohon_telpon'] ?>">

                                            <input type="hidden" name="tblizinpendaftaran_npwp"
                                                id="tblizinpendaftaran_npwp" value="<?= $row['tblpemohon_npwp'] ?>"
                                                required>



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
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1 ">Nama Permohonan</label>
                                                    <select name="tblizinpermohonan_id" id="tblizinpermohonan_id"
                                                        class="form-control form-control-2 select2" required>
                                                        <option value="">Pilih</option>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1 nama_usaha">Nama Usaha/Tempat
                                                        Berkerja</label>
                                                    <input type="text" class="form-control form-control-2"
                                                        name="tblizinpendaftaran_usaha" id="tblizinpendaftaran_usaha"
                                                        required>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1 alamat_usaha">Alamat Usaha/Tempat
                                                        Berkerja</label>
                                                    <input type="text" class="form-control form-control-2"
                                                        name="tblizinpendaftaran_lokasiizin"
                                                        id="tblizinpendaftaran_lokasiizin" required>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Nama Kecamatan </label>
                                                    <select name="tblkecamatan_id" id="tblkecamatan_id"
                                                        class="form-control form-control-2 select2" required>
                                                        <option value="">Pilih</option>
                                                        <?php foreach ($kecamatan as $r) : ?>
                                                        <option value="<?= $r['tblkecamatan_id'] ?>">
                                                            <?= $r['tblkecamatan_nama'] ?>
                                                        </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Nama Kelurahan / Desa</label>
                                                    <select name="tblkelurahan_id" id="tblkelurahan_id"
                                                        class="form-control form-control-2 select select2" required>
                                                        <option value="">Pilih</option>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-12 px-4 pb-4">
                                                <div class="form-group">
                                                    <label for="" class="mb-1">Keterangan</label>
                                                    <textarea name="tblizinpendaftaran_keterangan"
                                                        id="tblizinpendaftaran_keterangan" class="form-control"
                                                        rows="4"></textarea>
                                                    <div class="invalid-feedback">
                                                        Harus diisi.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row persyaratan">

                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="float-end">
                                                    <a class="btn btn-sm btn-outline-danger"
                                                        href="<?= site_url('permohonan') ?>">Batal</a>

                                                    <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile-1" role="tabpanel">
                                        <p class="mb-0">
                                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                            single-origin coffee squid. Exercitation +1 labore velit, blog
                                            sartorial PBR leggings next level wes anderson artisan four loko
                                            farm-to-table craft beer twee. Qui photo booth letterpress,
                                            commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                            vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                            aesthetic magna 8-bit.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        <p class="mb-0">
                                            Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                            sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                            farm-to-table readymade. Messenger bag gentrify pitchfork
                                            tattooed craft beer, iphone skateboard locavore carles etsy
                                            salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                            mi whatever gluten-free.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <p class="mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table.
                                        </p>
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div>




                        <!-- end card -->
                    </div> <!-- end col -->

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