<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">

    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="overlay"></div>


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
                                        <img src="<?= base_url() ?>tmp/assets/images/logo-sm.svg" alt="" height="28">
                                        <span class="logo-txt">Dason</span>
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
                                    <form method="post" class="login-form">


                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                required>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                required>
                                        </div>

                                        <div class="mt-4 mb-3">



                                            <button type="submit"
                                                class="btn btn-primary w-100 waves-effect waves-light">Login</button>
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

                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0">Belum punya akun ? <a
                                                href="<?= site_url('registrasi') ?>" class="text-primary fw-semibold">
                                                Registrasi Sekarang </a> </p>
                                    </div>
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


    <?php include(APPPATH . 'views/layout2/footer.php'); ?>
</body>

</html>