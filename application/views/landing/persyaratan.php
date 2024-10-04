<div class="table-responsive">
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>No.</th>
                <th>Persyaratan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $no ?>.</td>
                    <td><?= $row['tblpersyaratan_nama'] . '<br><small><i>Format : ' . $row['format'] . '</i></small>' ?>
                    </td>
                </tr>
            <?php $no++;
            endforeach ?>
        </tbody>
    </table>
</div>