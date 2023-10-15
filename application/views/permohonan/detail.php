<?php include(APPPATH . 'views/layout/head.php'); ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include(APPPATH . 'views/layout/topbar.php'); ?>
    <?php include(APPPATH . 'views/layout/menu.php'); ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Permohonan";
                $title = "Detail Permohonan";
                ?>
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><?php echo $title; ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a
                                            href="javascript: void(0);"><?php echo $maintitle; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                Riwayat Berkas

                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>No.</th>
                                                <th>Dari</th>
                                                <th>Proses</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Dikirim Ke</th>
                                                <th>Tanggal Berkas Fisik Dikirim</th>
                                                <th>Catatan</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                            <?php $no = 1 ?>
                                            <?php foreach ($log as $r) : ?>

                                            <tr>
                                                <td><?= $no ?>.</td>
                                                <td><?= $r['nama_asal'] ?></td>
                                                <td><?= $r['tblkendalibloksistemtugas_nama'] ?></td>
                                                <td><?= $r['tgl_mulai'] ?></td>
                                                <td><?= $r['tgl_selesai'] ?></td>
                                                <td><?= $r['nama_tujuan'] ?></td>
                                                <td><?= $r['tgl_berkas'] ?></td>
                                                <td><?= $r['tblkendaliproses_catatan'] ?></td>
                                                <td><?= $r['status'] ?></td>
                                                <td>

                                                    <?php if ($r['tblkendaliproses_status'] == 10) : ?>
                                                    <button class="btn btn-success">Perbaiki</button>
                                                    <?php endif ?>

                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach ?>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                Detail Permohonan

                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Nomor Pendaftaran</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_nomor'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Identitas</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_idpemohon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pemohon</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_namapemohon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_almtpemohon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. Telepon</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_telponpemohon'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkecamatan_nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_keterangan'] ?></td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <table class="table table-borderless">


                                            <tr>
                                                <td>Nama Izin</td>
                                                <td>:</td>
                                                <td><?= $r['tblizin_nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Permohonan</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpermohonan_nama'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Nama Usaha</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_usaha'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi Usaha / Bangunan</td>
                                                <td>:</td>

                                                <td><?= $r['tblizinpendaftaran_lokasiizin'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkelurahan_nama'] ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->




            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © Dason.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="#!" class="text-decoration-underline">Themesdesign</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include(APPPATH . 'views/layout/footer.php'); ?>