<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pelayanan Terpadu DPMPTSP Kabupaten Tanah Laut</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('tmp/assets/landing/styles.css') ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />

    <style>
    /* Mengubah tinggi dan font size elemen select2 */
    .select2-container .select2-selection--single {
        height: 35px;
        /* Atur tinggi sesuai kebutuhan */
        font-size: 14px;
        /* Atur ukuran font sesuai kebutuhan */
        padding: 5px;
        /* Sesuaikan padding jika diperlukan */
    }

    /* Mengubah ukuran font dropdown select2 */
    .select2-container .select2-dropdown {
        font-size: 14px;
        /* Atur ukuran font dropdown */
    }
    </style>
</head>



<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('tmp/assets/landing/logo1.png') ?>" alt="SSCASN Logo" class="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
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
            <div class="navbar-nav ms-auto">
                <a class="btn btn-outline-secondary me-2" href="<?= site_url('registrasi') ?>">Buat Akun</a>
                <a class="btn btn-primary" href="<?= site_url('login') ?>">Masuk</a>
            </div>
        </div>
    </nav>


    <!-- Sections with IDs -->
    <section id="home" class="hero py-5">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-8 text-center text-lg-start">
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
                <form action="" method="post" id="cekForm">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-8 col-lg-6">
                            <label for="nomorPendaftaran" class="form-label">Nomor Pendaftaran</label>
                            <input type="text" id="nomorPendaftaran" name="noPendaftaran"
                                placeholder="Masukkan nomor pendaftaran" class="form-control" required />
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="form-group col-md-8 col-lg-6 text-center">
                            <button class="btn btn-primary btn-sm btn-block" id="cekBtn" type="submit">
                                Cek Status
                            </button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </section>




    <section id="info" class="py-5 info-section">
        <div class="container">
            <h2 class="text-center">Informasi Persyaratan</h2>
            <div class="form-wrapper">
                <form action="" method="post" id="cekPersyaratan">
                    <div class="row justify-content-center">
                        <div class="form-group col-12 col-lg-6 mb-3">
                            <label for="izin" class="form-label">Nama Izin</label>
                            <select name="izin" id="izin" class="form-control" required>
                                <option value="">pilih</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-lg-6 mb-3">
                            <label for="permohonan" class="form-label">Nama Permohonan</label>
                            <select name="permohonan" id="permohonan" class="form-control" required>
                                <option value="">pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-12 col-lg-6 text-center">
                            <button class="btn btn-primary btn-sm btn-block" id="cekInfo" type="submit">
                                Cek Info
                            </button>
                        </div>
                    </div>
                </form>
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



    <!-- Modal -->
    <div class="modal fade" id="modalStatusPendaftaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Status Permohonan</h5>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPersyaratan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="largeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Persyaratan</h5>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

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

    $('#cekForm').on('submit', function(e) {
        e.preventDefault();

        $('#cekBtn').prop('disabled', true).text('Sedang memuat...');

        var formData = $(this).serialize();

        $.ajax({
            url: '<?= site_url('landing/permohonan_by_no_pendaftaran') ?>',
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#modalStatusPendaftaran .modal-body').html(response);
                $('#modalStatusPendaftaran').modal('show');

                $('#cekBtn').prop('disabled', false).text('Cek Status');
            },
            error: function(xhr, status, error) {

                console.error(error)
                $('#cekBtn').prop('disabled', false).text('Cek Status');
            }
        });
    });

    $('#cekPersyaratan').on('submit', function(e) {
        e.preventDefault();

        $('#cekInfo').prop('disabled', true).text('Sedang memuat...');

        var formData = $(this).serialize();

        $.ajax({
            url: '<?= site_url('landing/get_persyaratan') ?>',
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#modalPersyaratan .modal-body').html(response);
                $('#modalPersyaratan').modal('show');

                $('#cekInfo').prop('disabled', false).text('Cek Info');
            },
            error: function(xhr, status, error) {

                console.error(error)
                $('#cekInfo').prop('disabled', false).text('Cek Info');
            }
        });
    });

    $('#izin,#permohonan', ).select2({
        placeholder: "pilih",
        allowClear: true,
    });

    $.ajax({
        url: '<?= site_url('landing/get_izin') ?>', // URL endpoint untuk mengambil data izin
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            $('#izin').empty();


            $('#izin').append('<option value="">pilih</option>');

            $.each(data, function(key, value) {
                $('#izin').append('<option value="' + value.key + '">' + value.value +
                    '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error('Gagal memuat data izin:', error);
        }
    });


    // Ketika opsi #izin berubah, load data untuk #permohonan
    $('#izin').on('change', function() {
        var selectedIzin = $(this).val(); // Ambil nilai izin yang dipilih

        // Cek apakah ada izin yang dipilih
        if (selectedIzin) {
            // Lakukan AJAX request dengan POST untuk mendapatkan data permohonan berdasarkan izin yang dipilih
            $.ajax({
                url: '<?= site_url('landing/get_permohonan') ?>', // URL untuk mengambil data permohonan terkait izin
                type: 'POST', // Menggunakan metode POST
                data: {
                    izin: selectedIzin
                }, // Kirim data izin yang dipilih via POST
                dataType: 'json',
                success: function(data) {
                    // Kosongkan opsi sebelumnya di #permohonan
                    $('#permohonan').empty();

                    // Tambahkan placeholder "pilih"
                    $('#permohonan').append('<option value="">Pilih</option>');

                    // Isi opsi dengan data permohonan yang diterima
                    $.each(data, function(key, value) {
                        $('#permohonan').append('<option value="' + value.key + '">' + value
                            .value + '</option>');
                    });

                    // Refresh Select2 untuk #permohonan
                    $('#permohonan').trigger('change');
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memuat data permohonan:', error);
                }
            });
        } else {
            // Jika tidak ada izin yang dipilih, kosongkan opsi #permohonan
            $('#permohonan').empty();
            $('#permohonan').append('<option value="">Pilih</option>');
            $('#permohonan').trigger('change');
        }
    });
    </script>
</body>

</html>