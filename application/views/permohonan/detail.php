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
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <p> Progres Permohonan</p>
                                    <a href="#" class="btn btn-primary" onclick="detail()">Detail
                                        Permohonan </a>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Tanggal Permohonan</td>
                                                <td>:</td>
                                                <td><?= $r['tgl_daftar'] ?></td>
                                            </tr>
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
                                                <td>Nomor NPWP</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_npwp'] ?></td>
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



                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="table-responsive">
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
                                                <td>Nama Usaha / Tempat Berkerja</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_usaha'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Usaha / Alamat Tempat Berkerja</td>
                                                <td>:</td>

                                                <td><?= $r['tblizinpendaftaran_lokasiizin'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kecamatan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkecamatan_nama'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelurahan</td>
                                                <td>:</td>
                                                <td><?= $r['tblkelurahan_nama'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $r['tblizinpendaftaran_keterangan'] ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
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