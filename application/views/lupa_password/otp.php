<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card  d-flex flex-column align-items-center mt-4">
                    <div class="row">
                        <div class="col-md-12">

                            <h5 class="text-center mt-4 p-4"><?= aplikasi() ?></h5>

                            <form method="post" class="form-verifikasi-otp p-4">


                                <div class="form-group mt-4 px-2">
                                    <label for="">Masukkan Kode Verifikasi (OTP)</label>
                                    <input type="hidden" name="number" value="<?= $this->session->number; ?>">
                                    <input type="text" name="otp" id="otp" class="form-control"
                                        placeholder="Kode OTP dikirim melalui WhatsApp ke <?= $this->session->number; ?>"
                                        required>
                                </div>

                                <div class="mt-4 mb-3 px-2">
                                    <button type="submit"
                                        class="btn btn-primary w-100 waves-effect waves-light">Verifikasi</button>
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