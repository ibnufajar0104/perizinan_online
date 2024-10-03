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