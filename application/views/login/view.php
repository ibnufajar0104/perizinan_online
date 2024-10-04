<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">



    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-12">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center mt-4 p-4"><?= aplikasi() ?></h5>
                            <p class="text-center mt-4">Login untuk memulai sesi</p>
                            <form method="post" class="form-login p-4">


                                <div class="form-group mt-4 px-2">
                                    <label for="jenis_pemohon">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= $this->session->username ?>" required>
                                </div>

                                <div class="form-group mt-4 px-2">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                            required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-3 px-2">
                                    <button type="submit"
                                        class="btn btn-primary w-100 waves-effect waves-light">Login</button>

                                </div>
                                <div class="mt-2 px-2">
                                    <p class="text-muted mb-0">Belum punya akun ? </p>
                                </div>

                                <div class="px-2">
                                    <a href="<?= site_url('registrasi') ?>"
                                        class="btn btn-outline-primary w-100 waves-effect waves-light mb-3">Registrasi
                                        Sekarang</a>

                                    <a href="<?= site_url('lupa_password') ?>">Lupa Password ?</a>
                                </div>



                            </form>

                        </div>

                        <div class="col-md-6 text-center">

                            <img class="form-image"
                                src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/fotopns123-1.png"
                                alt="" width="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include(APPPATH . 'views/layout2/footer.php'); ?>
</body>

</html>