<div class="table-responsive">
    <table class="table align-middle">
        <thead class="table-light">

            <tr>
                <th>No.</th>
                <th>Dari</th>
                <th>Proses</th>

                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Dikirim Ke</th>

                <th>Catatan</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($log as $key =>  $row) : ?>

            <tr>
                <td><?= $no ?>.</td>
                <td><?= $row['nama_asal'] ?></td>
                <td><?= $row['tblkendalibloksistemtugas_nama'] ?></td>
                <td><?= $row['tgl_mulai'] ?></td>
                <td><?= $row['tgl_selesai'] ?></td>
                <td><?= $row['nama_tujuan'] ?></td>

                <td><?= $row['tblkendaliproses_catatan'] ?></td>
                <td><?= $row['status'] ?></td>

            </tr>
            <?php $no++; ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<p class="d-flex d-md-none"> Swipe atau geser ke kanan</p>