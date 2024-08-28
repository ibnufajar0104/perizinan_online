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


</head>

<style>
.title {
    font-weight: bold;
    color: #333;
    margin-bottom: 0.2rem;
    font-size: 14px;
}

.value {
    color: #555;
    font-size: 14px;

}

table {
    font-size: 14px;
}
</style>

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
                    <a class="nav-link" href="#buku">Buku Petunjuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alur">Alur</a>
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
    <section id="home" class="hero bg-light py-5">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8 text-center text-md-left">
                    <h1 class="display-4">Pelayanan Terpadu DPMPTSP Tanah Laut</h1>
                    <p class="lead">
                        Memudahkan proses pengajuan dan pengelolaan izin di Kabupaten Tanah Laut.
                    </p>
                    <a class="btn btn-primary btn-lg mt-3" href="<?= site_url('login') ?>">Mulai Sekarang</a>

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
                <p>
                    Pantau perkembangan permohonan perizinan dengan menggunakan nomor
                    pendaftaran
                </p>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label class="form-label">Nomor Pendaftaran</label>
                        <input type="text" placeholder="contoh : 123/08/2023" class="form-control text-3 h-auto py-2"
                            required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <button class="btn btn-sm btn-primary cek" type="submit">
                            Cek Status
                        </button>
                    </div>
                </div>
                <div class="row mt-4 d-none">
                    <div class="col-12">
                        <div class="card detail-permohonan">
                            <div class="card-body">
                                <div class="row gy-4">
                                    <!-- Menambahkan gy-4 untuk memberi jarak antar elemen vertikal -->
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Kolom 1 dari 3 -->
                                        <div class="mb-3">
                                            <p class="title">Nomor Pendaftaran</p>
                                            <p class="value">942/226/80/08/2024</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Tanggal Permohonan</p>
                                            <p class="value">24 Agustus 2024</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nomor Identitas</p>
                                            <p class="value">6301030108980003</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nomor NPWP</p>
                                            <p class="value">2424234234234123</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <!-- Kolom 2 dari 3 -->
                                        <div class="mb-3">
                                            <p class="title">Nama Pemohon</p>
                                            <p class="value">Ibnu Fajar</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Alamat</p>
                                            <p class="value">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">No. Telepon</p>
                                            <p class="value">085245065929</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Keterangan</p>
                                            <p class="value">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Kecamatan</p>
                                            <p class="value">Pelaihari</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4">
                                        <!-- Kolom 3 dari 3 -->
                                        <div class="mb-3">
                                            <p class="title">Nama Izin</p>
                                            <p class="value">Surat Izin Praktik Perawat</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Permohonan</p>
                                            <p class="value">Surat Izin Praktik Perawat Baru</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Usaha/Tempat Berkerja</p>
                                            <p class="value">RSUD BOEJASIN</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Alamat Usaha/Tempat Berkerja</p>
                                            <p class="value">Jl. A. Yani</p>
                                        </div>

                                        <div class="mb-3">
                                            <p class="title">Kelurahan</p>
                                            <p class="value">Pelaihari</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 d-none">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <p> Timeline Berkas Permohonan</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Dari</th>
                                                    <th>Proses</th>

                                                    <th>Tanggal</th>
                                                    <th>Dikirim Ke</th>

                                                    <th>Catatan</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>

                                                <tr>
                                                    <td>1.</td>
                                                    <td>Kepala Dinas</td>
                                                    <td>Penandatanganan Berkas Izin</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>Kepala Dinas</td>

                                                    <td>Berkas sudah ditanda tangani</td>
                                                    <td>Sudah diproses</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>2.</td>
                                                    <td>BO Usaha 2</td>
                                                    <td>Cetak SKR</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>Kepala Dinas</td>

                                                    <td>xxx</td>
                                                    <td>Diproses</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>3.</td>
                                                    <td>BO Usaha 2</td>
                                                    <td>Penerbitan Naskah Perizinan</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>BO Usaha 2</td>

                                                    <td>SK telah dicetak</td>
                                                    <td>Sudah diproses</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>4.</td>
                                                    <td>Tim Teknis Kesehatan</td>
                                                    <td>Validasi Berkas Permohonan</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>BO Usaha 2</td>

                                                    <td>BO</td>
                                                    <td>Sudah dikirim</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>5.</td>
                                                    <td>Tim Teknis Kesehatan</td>
                                                    <td>Validasi Berkas Permohonan</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>Tim Teknis Kesehatan</td>

                                                    <td>Rekomendasi telah dicetak</td>
                                                    <td>Sudah diproses</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>6.</td>
                                                    <td>Pendaftaran Kelompok 1</td>
                                                    <td>Menerima Pendaftaran</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>Tim Teknis Kesehatan</td>

                                                    <td>-</td>
                                                    <td>Sudah dikirim</td>
                                                    <td>


                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>7.</td>
                                                    <td>Pemohon</td>
                                                    <td>Input berkas pendaftaran</td>

                                                    <td>24 Agustus 2024</td>
                                                    <td>Pendaftaran Kelompok 1</td>

                                                    <td>Pendaftaran</td>
                                                    <td>Sudah dikirim</td>
                                                    <td>


                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
        </div>
    </section>




    <section id="info" class="py-5 info-section">
        <div class="container">
            <h2 class="text-center">Informasi Persyaratan</h2>

            <div class="row">
                <div class="col">
                    <form class="cek-info-form form-wrapper" action="" method="POST">
                        <p>Informasi berkas persyaratan permohonan izin</p>
                        <input type="hidden" name="csrf_test_name" value="2e9be7f3bc85aafea1bdadb51150a7e1" />
                        <div class="col_one_third">

                            <div class="row">
                                <div class="form-group col-lg-6">


                                    <label class="form-label">Izin</label>
                                    <select name="izin" id="izin" class="form-control single" required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">


                                    <label class="form-label">Permohonan</label>
                                    <select name="permohonan" id="permohonan" class="form-control single" required>
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group col">
                                    <button class="btn btn-sm btn-primary cek-info" type="submit">
                                        Cek Info
                                    </button>

                                </div>
                            </div>
                    </form>
                </div>
            </div>
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
                <div class="col-md-4">
                    <h4>Kontak</h4>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Alamat: Jl. Contoh No. 123, Kota Contoh
                    </p>
                    <p>
                        <i class="fas fa-phone"></i> Telepon: (123) 456-7890
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i> Email: info@example.com
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Media Sosial</h4>
                    <p>
                        <a href="https://facebook.com" class="text-dark mr-3"><i class="fab fa-facebook-f"></i>
                            Facebook</a><br>
                        <a href="https://twitter.com" class="text-dark mr-3"><i class="fab fa-twitter"></i>
                            Twitter</a><br>
                        <a href="https://instagram.com" class="text-dark mr-3"><i class="fab fa-instagram"></i>
                            Instagram</a><br>
                        <a href="https://linkedin.com" class="text-dark"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                    </p>
                </div>
                <div class="col-md-4 text-center d-flex align-items-center">
                    <img src="<?= base_url('tmp/assets/landing/logo2.png') ?>" alt="Logo" class="footer-logo mr-3">
                    <p class="mb-0">
                        Pelayanan Terpadu DPMPTSP Tanah Laut
                    </p>
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