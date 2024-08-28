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
                $title = "Daftar Permohonan";
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
                                <div class="d-md-flex justify-content-between align-items-center"
                                    style="font-weight: bold;">
                                    <?php if ($permohonan) : ?>
                                    <p> Selalu periksa perkembangan permohonan anda dengan mengklik tombol
                                        "Detail"</p>
                                    <?php else : ?>
                                    <p> Ajukan permohonan anda dengan menekan tombol "Ajukan Permohonan"</p>
                                    <?php endif ?>

                                    <a href="<?= site_url('permohonan/informasiUmum') ?>"
                                        class="btn btn-sm btn-primary">Ajukan
                                        Permohonan</a>
                                </div>

                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-borderless w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <td>No. Pendaftaran</td>
                                                <th>Izin</th>
                                                <th>Permohonan</th>

                                                <th>Usaha/Tempat Berkerja</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php if ($permohonan) : ?>
                                            <?php foreach ($permohonan as $r) : ?>
                                            <tr>
                                                <td><?= $no ?>.</td>
                                                <td><?= $r['tblizinpendaftaran_nomor'] ?></td>
                                                <td><?= $r['tblizin_nama'] ?></td>
                                                <td><?= $r['tblizinpermohonan_nama'] ?></td>
                                                <td><?= $r['tblizinpendaftaran_usaha'] ?></td>

                                                <td><?= $r['tgl_daftar'] ?></td>
                                                <td><?= status($r['status']) ?></td>
                                                <td>
                                                    <a href="<?= site_url('permohonan/detail/' . $r['tblizinpendaftaran_id']) ?>"
                                                        class="btn btn-outline-secondary btn-sm">Detail</a>

                                                    <?php if ($r['status'] == 1) : ?>
                                                    <a href="<?= site_url('permohonan/edit/' . $r['tblizinpendaftaran_id']) ?>"
                                                        class="btn btn-outline-secondary btn-sm">Edit</a>
                                                    <?php endif ?>
                                                </td>


                                            </tr>
                                            <?php $no++ ?>
                                            <?php endforeach ?>
                                            <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada permohonan</td>
                                            </tr>
                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include(APPPATH . 'views/layout/footer.php'); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include(APPPATH . 'views/layout/js.php'); ?>