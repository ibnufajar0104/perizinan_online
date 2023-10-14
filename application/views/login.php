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

</head>

<body data-layout="horizontal" data-topbar="dark">

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                        <div class="row justify-content-center align-items-end">
                            <div class="col-xl-7">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">

                                        <!-- end carouselIndicators -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="testi-contain text-center text-white">

                                                    <h4 class="mt-4 fw-medium lh-base text-white">

                                                        Selamat datang di Sistem Informasi Manajemen Pelayanan Terpadu
                                                        Kabupaten Tanah Laut. Silahkan login pada aplikasi menggunakan
                                                        form disamping
                                                    </h4>
                                                    <div class="mt-4 pt-1 pb-5 mb-5">
                                                        <!-- <h5 class="font-size-16 text-white">Richard Drews
                                                        </h5>
                                                        <p class="mb-0 text-white-50">Web Designer</p> -->
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end carousel-inner -->
                                    </div>
                                    <!-- end review carousel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">

                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Sistem Informasi Manajemen Pelayanan Terpadu
                                            Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                                            Kabupaten Tanah Laut</h5>
                                        <p class="text-muted mt-4">Login untuk masuk ke aplikasi.</p>
                                    </div>
                                    <form method="post" action="">
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control " id="jenis_pemohon"
                                                name="jenis_pemohon" placeholder="Enter User Name">
                                            <label for="input-username">Jenis Pemohon</label>

                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>
                                        <div class="form-floating form-floating-custom mb-4">
                                            <input type="text" class="form-control " id="\username" name="username"
                                                placeholder="Enter User Name">
                                            <label for="input-username">Username</label>

                                            <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                            </div>
                                        </div>

                                        <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                            <input type="password" class="form-control pe-5" id="password"
                                                name="password" placeholder="Enter Password">

                                            <button type="button"
                                                class="btn btn-link position-absolute h-100 end-0 top-0"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                            </button>
                                            <label for="input-password">Password</label>
                                            <div class="form-floating-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>

                                        <div class="row mb-4">


                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log
                                                In</button>
                                        </div>

                                    </form>

                                    <div class="mt-4 pt-2 text-center">

                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Belum Punya Akun ? <a
                                                href="<?= site_url('registrasi') ?>" class="text-primary fw-semibold">
                                                Daftar Sekarang </a> </p>
                                    </div>
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

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <script src="assets/js/app.js"></script>


</body>

</html>