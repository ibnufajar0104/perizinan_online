<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Nama Aplikasi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alur">Alur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info-persyaratan">Info Persyaratan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#registrasi">Registrasi</a>
                </li>
            </ul>
        </div>
    </nav>

    <section id="beranda" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div>
                        <h1 class="display-4">Selamat Datang di Nama Aplikasi</h1>
                        <p class="lead">Ini adalah aplikasi yang dirancang untuk membantu Anda dalam [deskripsi
                            aplikasi].</p>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <img src="https://via.placeholder.com/600x400" alt="Gambar Aplikasi" class="hero-image">
                </div>
            </div>
        </div>
    </section>

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
                            <!-- <div class="logo text-center">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/e635f48923a6082f99ca78be2b100163.png"
                                    alt="" width="50">
                                <img src="https://raw.githubusercontent.com/ibnufajar0104/img_statis/main/b9b6479351238932e3e02b0e165f8d0a-removebg-preview.png"
                                    alt="" width="110">
                            </div> -->
                            <h5 class="text-center mt-4"><?= aplikasi() ?></h5>
                            <p class="text-center mt-4">Login untuk memulai sesi</p>
                            <form method="post" class="form-login p-4">


                                <div class="form-group mt-4">
                                    <label for="jenis_pemohon">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= $this->session->username ?>" required>
                                </div>

                                <div class="form-group mt-4">
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

                                <div class="mt-4 mb-3">



                                    <button type="submit"
                                        class="btn btn-primary w-100 waves-effect waves-light">Login</button>


                                </div>
                                <div class="mt-2 ">
                                    <p class="text-muted mb-0">Belum punya akun ? </p>
                                </div>

                                <a href="<?= site_url('registrasi') ?>"
                                    class="btn btn-outline-primary w-100 waves-effect waves-light  mb-3">Registrasi
                                    Sekarang</a>
                                <a href="<?= site_url('lupa_password') ?>"
                                    class="btn btn-outline-primary w-100 waves-effect waves-light">Lupa
                                    Password</a>
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