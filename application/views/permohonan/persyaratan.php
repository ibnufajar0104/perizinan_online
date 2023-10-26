<div class="col-md-12 col-12 mb-3">
    <h6 class="text-uppercase"> Persyaratan </h6>
    <hr>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-persyaratan table-borderless">

                <?php foreach ($row as $r) : ?>
                    <tr>

                        <td width="50%">
                            <div class="text-wrap mb-2">
                                <?= $r['tblpersyaratan_nama'] ?>
                            </div>
                            <input type="file" name="<?= $r['tblpersyaratan_id'] ?>" id="<?= $r['tblpersyaratan_id'] ?>" class="form-control form-control-sm mb-2">
                        </td>

                        <td> <?php if (isset($r['file'])) : ?>
                                <!-- <a target="_blank" href="<?= site_url('doc/persyaratan/' . $r['file']) ?>">Lihat file
                                    sebelumnya</a> -->
                                <button type="button" onclick="review('<?= base_url('doc/persyaratan/' . $r['file']) ?>')" class="btn btn-block btn-secondary btn-sm review  mb-2"><i class="fadeIn animated bx bx-file"></i>
                                    File
                                    anda
                                    sebelumnya</button>
                            <?php endif ?>
                        </td>


                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>