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
                            <div class="card-body">
                                <div class="row gy-4">
                                    <!-- Informasi Pemohon -->
                                    <div class="col-md-6 col-lg-4">
                                        <div class="mb-3">
                                            <p class="title">Nomor Pendaftaran</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_nomor'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nomor Identitas</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_idpemohon'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nomor NPWP</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_npwp'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Pemohon</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_namapemohon'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">No. Telepon</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_telponpemohon'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Alamat</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_almtpemohon'] ?></p>
                                        </div>
                                    </div>

                                    <!-- Informasi Permohonan Izin -->
                                    <div class="col-md-6 col-lg-4">
                                        <div class="mb-3">
                                            <p class="title">Nama Izin</p>
                                            <p class="value"><?= $r['tblizin_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Nama Permohonan</p>
                                            <p class="value"><?= $r['tblizinpermohonan_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Tanggal Permohonan</p>
                                            <p class="value"><?= $r['tgl_daftar'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Keterangan</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_keterangan'] ?></p>
                                        </div>
                                    </div>

                                    <!-- Informasi Usaha/Tempat Kerja -->
                                    <div class="col-md-6 col-lg-4">
                                        <div class="mb-3">
                                            <p class="title">Nama Usaha/Tempat Berkerja</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_usaha'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Alamat Usaha/Tempat Berkerja</p>
                                            <p class="value"><?= $r['tblizinpendaftaran_lokasiizin'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Kecamatan</p>
                                            <p class="value"><?= $r['tblkecamatan_nama'] ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="title">Kelurahan</p>
                                            <p class="value"><?= $r['tblkelurahan_nama'] ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <p> Timeline Berkas Permohonan</p>
                                    <!-- <a href="#" class="btn btn-primary" onclick="detail()">Detail
                                        Permohonan </a> -->
                                </div>


                            </div>
                            <div class="card-body">


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
                                                <?php $no = 1 ?>
                                                <?php foreach ($log as $key =>  $row) : ?>

                                                    <tr>
                                                        <td><?= $no ?>.</td>
                                                        <td><?= $row['nama_asal'] ?></td>
                                                        <td><?= $row['tblkendalibloksistemtugas_nama'] ?></td>

                                                        <td><?= $row['tgl_selesai'] ?></td>
                                                        <td><?= $row['nama_tujuan'] ?></td>

                                                        <td><?= $row['tblkendaliproses_catatan'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td>

                                                            <?php if ($row['tblkendaliproses_status'] == 10 && $key == 0) : ?>
                                                                <a class="btn btn-success btn-sm"
                                                                    href="<?= site_url('permohonan/edit/' . $row['tblizinpendaftaran_id']) ?>">Perbaiki</a>

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
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <!-- end row -->

            </div> <!-- container-fluid -->
            <div class="modal fade" id="detailModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- End Page-content -->


        <?php include(APPPATH . 'views/layout/footer.php'); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include(APPPATH . 'views/layout/js.php'); ?>