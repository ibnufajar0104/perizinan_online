<div class="col-md-12 col-12 mb-3">
    <h6 class="text-uppercase"> Persyaratan </h6>
    <hr>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-borderless">
                <tr>
                    <th>No</th>
                    <th width="400">Persyaratan</th>
                    <th>File Sebelumnya</th>
                    <th>

                    </th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($row as $r) : ?>
                <tr>
                    <td><?= $no ?>.</td>
                    <td>
                        <div class="text-wrap">
                            <?= $r['tblpersyaratan_nama'] ?>
                        </div>
                    </td>
                    <td>
                        <?php if (isset($r['file'])) : ?>
                        <a target="_blank" href="<?= ip() . 'doc/persyaratan/' . $r['file'] ?>"><?= $r['file'] ?></a>
                        <?php else : ?>
                        Tidak ada
                        <?php endif ?>

                    </td>
                    <td>
                        <input type="file" name="<?= $r['tblpersyaratan_id'] ?>" id="<?= $r['tblpersyaratan_id'] ?>"
                            class="form-control persyaratan_upload" required>
                        <div class="invalid-feedback">
                            Harus diisi.
                        </div>
                    </td>
                </tr>
                <?php $no++ ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>

</div>