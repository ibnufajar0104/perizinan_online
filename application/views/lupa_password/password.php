<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">

                        <div class="col-md-12">
                            <h5 class="text-center mt-4 p-4"><?= aplikasi() ?></h5>
                            <form method="post" class="form-ganti-password p-4">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group px-2">
                                            <label for="tblpengguna_password">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="tblpengguna_password"
                                                    name="password" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button" data-target="tblpengguna_password">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group px-2">
                                            <label for="konfirmasi">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="konfirmasi"
                                                    name="konfirmasi" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button" data-target="konfirmasi">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="validasi text-danger mt-2"></div>
                                <div class="mt-4 mb-3">

                                    <input type="hidden" name="tblpengguna_id" id="tblpengguna_id"
                                        value="<?= $this->session->tblpengguna_id ?>">
                                    <button type="submit"
                                        class="btn btn-primary w-100 waves-effect waves-light">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include(APPPATH . 'views/layout2/footer.php'); ?>
</body>

</html>