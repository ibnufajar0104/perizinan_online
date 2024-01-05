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
                            <!-- <div class="logo text-center">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/e635f48923a6082f99ca78be2b100163.png"
                                    alt="" width="50">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/b9b6479351238932e3e02b0e165f8d0a-removebg-preview.png"
                                    alt="" width="110">
                            </div> -->
                            <h5 class="text-center mt-4"><?= aplikasi() ?></h5>
                            <!-- <p class="text-center mt-4">Form Lupa Password</p> -->
                            <form method="post" class="form-ganti-password p-4">

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-group">
                                            <label for="tblpengguna_password">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="tblpengguna_password" name="password" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="tblpengguna_password">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="konfirmasi">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="konfirmasi">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="validasi text-danger mt-2"></div>
                                <div class="mt-4 mb-3">


                                    <input type="hidden" name="tblpengguna_id" id="tblpengguna_id" value="<?= $this->session->tblpengguna_id ?>">
                                    <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">Simpan</button>
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