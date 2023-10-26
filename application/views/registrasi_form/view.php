<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">



    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-12">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">
                        <div class="col-md-6 text-center">

                            <img class="form-image"
                                src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/fotopns123-1.png"
                                alt="" width="400">
                        </div>

                        <div class="col-md-6 form-padding">
                            <div class="logo text-center">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/e635f48923a6082f99ca78be2b100163.png"
                                    alt="" width="50">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/b9b6479351238932e3e02b0e165f8d0a-removebg-preview.png"
                                    alt="" width="110">
                            </div>
                            <h5 class="text-center mt-4"><?= aplikasi() ?></h5>
                            <p class="text-center mt-4">Daftar terlebih dahulu, untuk bisa melakukan login</p>
                            <form method="post" class="form-daftar">
                                <input type="hidden" name="tblpemohon_noidentitas"
                                    value="<?= $this->session->username ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Nama Pemohon</label>
                                            <input type="text" name="tblpemohon_nama" id="tblpemohon_nama"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Nomor WA Pemohon</label>
                                            <input type="text" name="tblpemohon_telpon" id="tblpemohon_telpon"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">NPWP Pemohon</label>
                                            <input type="text" name="tblpemohon_npwp" id="tblpemohon_npwp"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon"> Email Pemohon</label>
                                            <input type="text" name="tblpemohon_email" id="tblpemohon_email"
                                                class="form-control">
                                        </div>
                                    </div>



                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Alamat</label>
                                            <textarea name="tblpemohon_alamat" id="tblpemohon_alamat"
                                                class="form-control" placeholder="Alamat/RT/RW/Kecamatan/Kelurahan"
                                                rows="4"></textarea>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                value="<?= $this->session->username ?>" readonly>
                                        </div>
                                    </div>




                                </div>





                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Password</label>
                                            <input type="password" name="tblpengguna_password" id="tblpengguna_password"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="jenis_pemohon">Konfirmasi Password</label>
                                            <input type="password" name="konfirmasi" id="konfirmasi"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>




                                <div class="mt-4 mb-3">



                                    <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">
                                        Mendaftar</button>
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