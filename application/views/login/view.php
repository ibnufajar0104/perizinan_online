<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-12">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">
                        <div class="col-md-6 text-center">

                            <img class="form-image" src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/fotopns123-1.png" alt="" width="400">
                        </div>

                        <div class="col-md-6 form-padding">
                            <div class="logo text-center">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/e635f48923a6082f99ca78be2b100163.png" alt="" width="50">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/e635f48923a6082f99ca78be2b100163.png" alt="" width="50">
                            </div>
                            <h5 class="text-center mt-4"><?= aplikasi() ?></h5>
                            <p class="text-center mt-4">Login untuk memulai sesi</p>
                            <form method="post" class="form-login p-4">


                                <div class="form-group mt-4">
                                    <label for="jenis_pemohon">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $this->session->username ?>" required>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="jenis_pemohon">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <div class="mt-4 mb-3">



                                    <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">Login</button>
                                </div>
                            </form>
                            <div class="mt-2 text-center">
                                <p class="text-muted mb-0">Belum punya akun ? <a href="<?= site_url('registrasi') ?>" class="text-primary fw-semibold">
                                        Registrasi Sekarang </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include(APPPATH . 'views/layout2/footer.php'); ?>
</body>

</html>