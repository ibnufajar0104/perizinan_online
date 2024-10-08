<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <h5 class="text-center mt-4 p-4"><?= aplikasi() ?></h5>
                            <p class="text-center mt-4">Daftar terlebih dahulu, untuk bisa melakukan login</p>
                            <form method="post" action="<?= base_url('registrasi/cek') ?>"
                                class="form-cek-pendaftaran p-4">
                                <div class="form-group mt-4 px-2">
                                    <label for="jenis_pemohon">Status Pemohon</label>
                                    <select name="jenis" id="jenis" class="form-control" required>
                                        <option value="0">Pilih</option>
                                        <option value="1">Badan Usaha</option>
                                        <option value="2">Pribadi/Perorangan</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4 npwp px-2">
                                    <label for="jenis_pemohon">NPWP</label>
                                    <input type="text" name="tblpemohon_npwp" id="tblpemohon_npwp" class="form-control"
                                        maxlength="16" minlength="15">

                                </div>

                                <div class="form-group mt-4 nik px-2">
                                    <label for="jenis_pemohon">NIK</label>
                                    <input type="text" name="tblpemohon_noidentitas" maxlength="16" minlength="16"
                                        id="tblpemohon_noidentitas" class="form-control">
                                </div>

                                <div class="mt-4 mb-3 px-2">
                                    <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">Cek
                                        Pernah
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