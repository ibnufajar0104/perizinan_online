<?php include(APPPATH . 'views/layout2/head.php'); ?>

<body data-layout="horizontal" data-topbar="dark">
    <nav class="navbar navbar-expand-lg navbar-dark">

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
                        <p class="app-name">Pelayanan Terpadu Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu
                            Kabupaten Tanah Laut</p>

                        <p class="lead">Ini adalah aplikasi yang dirancang untuk membantu Anda dalam [deskripsi
                            aplikasi].</p>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <img src="<?= base_url('tmp/assets/images/gambar.png') ?>" alt="Gambar Aplikasi" class="hero-image">
                </div>
            </div>
        </div>
    </section>





    <?php include(APPPATH . 'views/layout2/footer.php'); ?>
</body>

</html>