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
                        <input type="file" name="<?= $r['tblpersyaratan_id'] ?>" id="<?= $r['tblpersyaratan_id'] ?>"
                            class="form-control form-control mb-2" <?= isset($r['file']) ? '' : 'required' ?>>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </td>

                    <td>
                        <?php if (isset($r['file'])) : ?>

                        <button type="button" onclick="review('<?= ip() . 'doc/persyaratan/' . $r['file'] ?>')"
                            class="btn btn-block btn-outline-success btn-sm review  mb-2"><i
                                class="fadeIn animated bx bx-file"></i>
                            Lihat file
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