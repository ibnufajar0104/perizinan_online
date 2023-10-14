<!DOCTYPE html>

<head>

    <title> Dason - Admin & Dashboard Template</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>tmp/assets/images/favicon.ico">

    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url() ?>tmp/assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>tmp/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>tmp/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>tmp/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- alertifyjs Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet"
        type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet"
        type="text/css" />

</head>

<body data-layout="horizontal" data-topbar="dark">

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>


                        <div class="row justify-content-center align-items-end">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <!-- <div class="mb-4 mb-md-5 text-center">
                                    <a href="index.php" class="d-block auth-logo">
                                        <img src="<?= base_url() ?>tmp/assets/images/logo-sm.svg" alt="" height="28"> <span
                                            class="logo-txt">Dason</span>
                                    </a>
                                </div> -->
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Sistem Informasi Manajemen Pelayanan Terpadu
                                            Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                                            Kabupaten Tanah Laut</h5>
                                        <p class="text-muted mt-4 mb-4">Untuk bisa login silahkan register terlebih
                                            dahulu.
                                        </p>
                                    </div>
                                    <form method="post" action="<?= site_url('registrasi/cek') ?>">
                                        <div class="form-group  mt-4">
                                            <label for="jenis_pemohon">Status Pemohon</label>
                                            <select name="jenis" id="jenis" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <option value="1">Badan Usaha</option>
                                                <option value="2">Pribadi/Perorangan</option>
                                            </select>
                                        </div>

                                        <div class="form-group mt-4 npwp">
                                            <label for="jenis_pemohon">Nomor NPWP</label>
                                            <input type="text" name="tblpemohon_npwp" id="tblpemohon_npwp"
                                                class="form-control">
                                        </div>

                                        <div class="form-group mt-4 nik">
                                            <label for="jenis_pemohon">NIK</label>
                                            <input type="text" name="tblpemohon_noidentitas" id="tblpemohon_noidentitas"
                                                class="form-control">
                                        </div>

                                        <div class="mt-4 mb-3">



                                            <button type="submit"
                                                class="btn btn-primary w-100 waves-effect waves-light">Cek Pernah
                                                Mendaftar</button>
                                        </div>

                                    </form>

                                    <!-- <div class="mt-4 pt-2 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="font-size-14 mb-3 text-muted fw-medium">- Sign in with -</h5>
                                        </div>

                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->

                                    <!-- <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.php" class="text-primary fw-semibold"> Signup now </a> </p>
                                    </div> -->
                                </div>
                                <div class="mt-4 mt-md-5 text-center">
                                    <!-- <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Dason . Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                        Themesdesign</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>

    <script src="<?= base_url() ?>tmp/assets/libs/jquery/jquery.min.js"></script>
    <!-- alertifyjs js -->
    <script src="<?= base_url() ?>tmp/assets/libs/alertifyjs/build/alertify.min.js"></script>


    <script>
    <?php if ($this->session->userdata('error')) : ?>
    alertify.error('<?= $this->session->userdata('error') ?>');
    <?php endif ?>


    <?php if ($this->session->userdata('success')) : ?>
    alertify.success('<?= $this->session->userdata('success') ?>');
    <?php endif ?>
    $('document').ready(function() {

        $('.npwp').hide();
        $('.nik').hide();

        $('#jenis').change(function() {

            if ($(this).val() == 1) {
                $('.npwp').show();
                $('.nik').hide();
                $("#tblpemohon_npwp").prop('required', true);
                $("#tblpemohon_noidentitas").prop('required', false);
            } else {
                $('.npwp').hide();
                $('.nik').show();

                $("#tblpemohon_npwp").prop('required', false);
                $("#tblpemohon_noidentitas").prop('required', true);
            }
        });
    })
    </script>
</body>

</html>