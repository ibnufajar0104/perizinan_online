<div class="card-header">

    Data Persyaratan
</div>
<div class="row mt-4">
    <div class="col-md-12 mt-2">
        <div class="table-responsive ">
            <table class="table table-borderless">
                <tr>
                    <th>Nama Persyaratan</th>
                    <th>Format</th>
                </tr>
                <?php foreach ($row as $r) : ?>
                <tr>

                    <td>
                        <div class="text-wrap">
                            <?= $r['tblpersyaratan_nama'] ?>
                        </div>

                    </td>
                    <td> <?= $r['format'] ?></td>
                    <td>





                        <input type="file" name="<?= $r['tblpersyaratan_id'] ?>" id="<?= $r['tblpersyaratan_id'] ?>"
                            <?= isset($r['file']) ? '' : 'required' ?> style="display: none;">
                        <div class="invalid-feedback">
                            Harus di upload
                        </div>

                        <div class="justify-content-between align-items-center">

                            <button type="button" class="btn btn-sm mb-2 btn-primary upload"
                                onclick="upload('<?= $r['tblpersyaratan_id'] ?>')">Upload
                            </button>

                            <button type="button"
                                class="btn btn-sm mb-2 btn-warning review <?= $r['tblpersyaratan_id'] ?>"
                                onclick="review_after_upload('<?= $r['tblpersyaratan_id'] ?>')"
                                style="display: none;">Review
                            </button>

                            <?php if (isset($r['file'])) : ?>

                            <button type="button" style="width: 160px;"
                                onclick="review('<?= path_persyaratan($r['file']) ?>')"
                                class="btn  btn-success btn-sm mb-2 review"><i class="fadeIn animated bx bx-file"></i>
                                File
                                anda
                                sebelumnya</button>

                            <?php endif ?>
                        </div>

                    </td>



                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>