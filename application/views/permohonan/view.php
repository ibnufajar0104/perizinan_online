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
                $title = "Data Permohonan";
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
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <a href="<?= site_url('/permohonan/informasiUmum') ?>"
                                                class="btn btn-primary btn-rounded waves-effect waves-light mb-2 me-2">
                                                <i class="mdi mdi-plus me-1"></i> Ajukan Permohonan</a>

                                        </div>
                                    </div><!-- end col-->
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nomor Pendaftaran</th>
                                                <th>Nama Izin</th>
                                                <th>Nama Permohonan</th>
                                                <th>Usaha/Tempat Berkerja</th>
                                                <th>Tanggal Permohonan</th>
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
                                                <td class="text-nowrap">

                                                    <?php if ($r['status'] != 5) : ?>
                                                    <a href="<?= site_url('permohonan/detail/' . $r['tblizinpendaftaran_id']) ?>"
                                                        class="btn btn-outline-info btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-information-outline"></i> Detail</a>
                                                    <?php endif ?>

                                                    <?php if ($r['status'] == 5) : ?>
                                                    <a href="<?= site_url('permohonan/informasiUmum/' . $r['tblizinpendaftaran_id']) ?>"
                                                        class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-circle-edit-outline"></i> Selesaikan Draf</a>
                                                    <?php endif ?>

                                                    <?php if ($r['status']  == 2) : ?>
                                                    <a href="<?= site_url('permohonan/perbaikan/' . $r['tblizinpendaftaran_id']) ?>"
                                                        class="btn btn-sm btn-success">Perbaiki</a>
                                                    <?php endif ?>
                                                </td>


                                            </tr>
                                            <?php $no++ ?>
                                            <?php endforeach ?>
                                            <?php else : ?>
                                            <tr>
                                                <td colspan="8" class="text-center">Belum ada permohonan</td>
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