<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelayanan Terpadu DPMPTSP Kabupaten Tanah Laut</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('tmp/assets/landing/styles.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>


<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('tmp/assets/landing/logo1.png') ?>" alt="SSCASN Logo" class="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#status">Status Permohonan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#info">Informasi Persyaratan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <a class="btn btn-outline-secondary mr-2" href="<?= site_url('registrasi') ?>">Buat Akun</a>
                <a class="btn btn-primary" href="<?= site_url('login') ?>">Masuk</a>

            </div>
        </div>
    </nav>


    <!-- Sections with IDs -->
    <section id="home" class="hero py-5">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8 text-center text-md-left">
                    <h1 class="display-4">Pelayanan Terpadu DPMPTSP Tanah Laut</h1>
                    <p class="lead">
                        Mudahnya proses permohonan izin di Kabupaten Tanah Laut.
                    </p>
                    <a class="btn btn-primary mt-3" href="<?= site_url('login') ?>">Coba Sekarang</a>

                </div>
                <div class="col-lg-4 col-md-4 text-center d-none d-md-block">
                    <img src="<?= base_url('tmp/assets/landing/gambar.png') ?>" alt="People in ASN uniform"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>


    <section id="status" class="py-5 status-section">
        <div class="container">
            <h2 class="text-center">Status Permohonan</h2>

            <!-- Form Wrapper -->
            <div class="form-wrapper">
                <p class="text-center">
                    Cek status perkembangan permohonan izin dengan menggunakan nomor
                    pendaftaran
                </p>
                <div class="row justify-content-center">
                    <div class="form-group col-md-8 col-lg-6">
                        <label for="nomorPendaftaran" class="form-label">Nomor Pendaftaran</label>
                        <input type="text" id="nomorPendaftaran" placeholder="Masukkan nomor pendaftaran"
                            class="form-control" required />
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="form-group col-md-8 col-lg-6 text-center">
                        <button class="btn btn-primary cek btn-block" type="submit">
                            Cek Status
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <section id="info" class="py-5 info-section">
        <div class="container">
            <h2 class="text-center">Informasi Persyaratan</h2>
            <div class="form-wrapper">

                <div class="row justify-content-center">
                    <div class="form-group col-md-8 col-lg-6">
                        <label for="nomorPendaftaran" class="form-label">Nama Izin</label>
                        <input type="text" id="nomorPendaftaran" placeholder="Masukkan nomor pendaftaran"
                            class="form-control" required />
                    </div>

                    <div class="form-group col-md-8 col-lg-6">
                        <label for="nomorPendaftaran" class="form-label">Nama Permohonan</label>
                        <input type="text" id="nomorPendaftaran" placeholder="Masukkan nomor pendaftaran"
                            class="form-control" required />
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="form-group col-md-8 col-lg-6 text-center">
                        <button class="btn btn-primary cek btn-block" type="submit">
                            Cek Info
                        </button>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col">
                    <form class="cek-info-form form-wrapper" action="" method="POST">
                        <p>Informasi berkas persyaratan permohonan izin</p>

                        <div class="row mt-4">
                            <div class="form-group col-lg-6">


                                <label class="form-label">Nama Izin</label>
                                <select name="izin" id="izin" class="form-control single" required>
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">


                                <label class="form-label">Nama Permohonan</label>
                                <select name="permohonan" id="permohonan" class="form-control single" required>
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>





                        <div class="row justify-content-center mt-3">
                            <div class="form-group col">
                                <button class="btn btn-primary cek btn-block" type="submit">
                                    Cek Info
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </section>




    <section id="faq" class="py-5 faq-section">
        <div class="container">
            <h2 class="section-title text-center">FAQ</h2>
            <div class="accordion" id="faqAccordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Apakah boleh akun perusahaan dipergunakan untuk mengajukan dan memproses perizinan /
                                perizinan perorangan ? Demikian juga sebaliknya ?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#faqAccordion">
                        <div class="card-body">
                            Tidak diperbolehkan. Karena menyebabkan dokumen perizinan yang diterbitkan menjadi tidak
                            valid.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Apa bedanya akun persusahaan dengan akun perorangan ?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                        <div class="card-body">
                            <ul>
                                <li>Akun perusahaan dikhususkan untuk mengajukan dan memproses perizinan yang
                                    berhubungan dengan aktivitas perusahaan/badan usaha</li>
                                <li>Akun perorangan dikhususkan untuk mengajukan dan memproses perizinan/non perizinan
                                    yang berhubungan dengan individu pemohon atau badan usaha yang berbentuk perorangan
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Dokumen apa yang perlu disiapkan untuk mendaftar/memperoleh akun perizinan ?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                        <div class="card-body">
                            <ol>
                                <li>Akun pelayanan perizinan dibedakan menjadi 2 (dua) kelompok yaitu <b>akun
                                        perusahaan</b> dan <b>akun perorangan</b></li>
                                <li>Untuk mendaftar/memperoleh<b> akun perusahaan</b>/badan usaha, siapkan dokumen/data
                                    <ul>
                                        <li style="line-height: 24px;">Nomor NPWP Perusahaan</li>
                                        <li style="line-height: 24px;">Nama Perusahaan/Badan Usaha</li>
                                        <li style="line-height: 24px;">Alamat Email Perusahan/Pemilik Perusahaan</li>
                                        <li style="line-height: 24px;">Nomor Telepon Perusahaan/Pemilik Perusahaan</li>
                                    </ul>
                                </li>
                                <li style="line-height: 24px;">Untuk mendaftar/memperoleh <b>akun perorangan</b>,
                                    siapkan dokumen/data<ul>
                                        <li style="line-height: 24px;">Nomor Induk Kependudukan (NIK)</li>
                                        <li style="line-height: 24px;">Nomor Kartu Keluarga (KK)</li>
                                        <li style="line-height: 24px;">Nama pemohon</li>
                                        <li style="line-height: 24px;">Alamat email pemohon</li>
                                        <li style="line-height: 24px;">Nomor telepon pemohon</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer bg-custom py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h4>Kontak</h4>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Alamat: Jl. A. Syairani No. 36 Pelaihari Kab. Tanah Laut
                    </p>
                    <p>
                        <i class="fas fa-phone"></i> Telepon: (0512) 22323
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i> Email: dpmptsp@tanahlautkab.go.id
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <h4>Media Sosial</h4>
                    <p>
                        <a href="https://www.facebook.com/p/Dinas-Penanaman-Modal-PTSP-Kabupaten-Tanah-laut-100069007396290/"
                            class="text-dark mr-3"><i class="fab fa-facebook-f"></i>
                            Facebook</a>



                    </p>
                    <p>
                        <a href="https://www.instagram.com/dpmptsptanahlaut" class="text-dark mr-3"><i
                                class="fab fa-instagram"></i>
                            Instagram</a>

                    </p>
                    <br>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 DPMPTSP Kabupaten Tanah Laut. All rights reserved.
        </div>
    </footer>



    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menangkap semua link dengan href yang mengarah ke ID di halaman
        const links = document.querySelectorAll('.navbar-nav a[href^="#"]');

        links.forEach((link) => {
            link.addEventListener("click", function(e) {
                e.preventDefault(); // Menghindari perilaku default dari anchor tag

                const targetId = this.getAttribute("href").substring(
                    1); // Mengambil ID dari href
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: "smooth", // Menambahkan efek smooth scroll
                    });
                }
            });
        });
    });
    </script>
</body>

</html>