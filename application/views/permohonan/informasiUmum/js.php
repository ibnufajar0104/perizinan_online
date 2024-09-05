<script>
    var global_url = '<?= base_url('permohonan/') ?>';
    $(document).ready(function() {
        // Ganti kondisi ini dengan pengecekan sebenarnya apakah "Informasi Umum" sudah selesai
        var isInformasiUmumSelesai = false;

        // Mencegah perpindahan tab jika informasi umum belum selesai
        $('#v-pills-profile-tab, #v-pills-messages-tab').on('show.bs.tab', function(event) {
            if (!isInformasiUmumSelesai) {
                event.preventDefault(); // Mencegah tab untuk berpindah
                showErrorMessage('Selesaikan Informasi Umum terlebih dahulu');
            }
        });


        $('.select2').select2();

        var id = $('#tblizinpendaftaran_id').val();

        if (id != '') {
            getRow(id);
        } else {
            $('#tblizin_id').change(function() {
                permohonanDinamis($(this).val(), '#tblizinpermohonan_id');
            });
            $('#tblkecamatan_id').change(function() {
                kelurahanDinamis($(this).val(), '#tblkelurahan_id');
            });
        }


        $('.informasi-umum').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var url = global_url + 'actionsInformasiUmum';

            postWithAjax(url, formData, function(response, error) {
                if (error) {
                    console.error(error);
                } else {
                    if (response.status) {
                        showSuccessMessage(response.msg);
                        redirectTo(global_url + 'berkasPersyaratan/' + response.id)
                    } else {
                        showErrorMessage(response.msg);

                    }
                }
            });
        });


    });



    function getRow(id) {
        var columns = ['tblizinpendaftaran_usaha', 'tblizinpendaftaran_lokasiizin', 'tblizinpendaftaran_keterangan'];
        $.ajax({
            url: "<?php echo site_url('permohonan/getPendaftaran') ?>",
            type: 'GET',
            data: {
                id: id
            }, // Kirimkan ID ke server
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    var data = response.data.pendaftaran;

                    // Mengisi nilai input form berdasarkan nama kolom
                    columns.forEach(function(column) {
                        $('#' + column).val(data[column]);
                    });

                    // Mengatur nilai select2 dan memicu change
                    $('#tblizin_id').val(data['tblizin_id']).trigger('change');

                    // Memanggil fungsi untuk mengisi dropdown lain secara dinamis
                    $('#tblizin_id').change(function() {
                        permohonanDinamis($(this).val(), '#tblizinpermohonan_id', function() {
                            // Callback setelah opsi diisi ulang
                            $('#tblizinpermohonan_id').val(data['tblizinpermohonan_id'])
                                .trigger('change');
                        });
                    });

                    $('#tblkecamatan_id').val(data['tblkecamatan_id']).trigger('change');

                    $('#tblkecamatan_id').change(function() {
                        kelurahanDinamis($(this).val(), '#tblkelurahan_id', function() {
                            $('#tblkelurahan_id').val(data['tblkelurahan_id']).trigger(
                                'change');
                        });
                    });


                    // Memicu perubahan untuk menjalankan permohonanDinamis
                    $('#tblizin_id').trigger('change');
                    $('#tblkecamatan_id').trigger('change');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }



    function permohonanDinamis(id, el, callback) {
        $(el).find('option').not(':first')
            .remove(); // Menghapus opsi kecuali yang pertama (biasanya placeholder)

        $.ajax({
            url: "<?php echo site_url('permohonan/get_permohonan') ?>",
            type: 'POST',
            data: {
                tblizin_id: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $.each(response.data, function(key, value) {
                        $(el).append('<option value="' + value.tblizinpermohonan_id + '">' +
                            value.tblizinpermohonan_nama + '</option>');
                    });

                    // Memanggil callback jika ada, untuk menetapkan nilai terpilih
                    if (callback && typeof callback === 'function') {
                        callback();
                    }
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }

    function kelurahanDinamis(id, el, callback) {
        $(el).find('option').not(':first').remove(); // Menghapus semua opsi kecuali yang pertama (biasanya placeholder)

        $.ajax({
            url: "<?php echo site_url('permohonan/get_kelurahan') ?>",
            type: 'POST',
            data: {
                id_kecamatan: id
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $.each(response.data, function(key, value) {
                        $(el).append('<option value="' + value.tblkelurahan_id + '">' + value
                            .tblkelurahan_nama + '</option>');
                    });

                    // Memanggil callback jika ada untuk menetapkan nilai terpilih
                    if (callback && typeof callback === 'function') {
                        callback();
                    }
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }
</script>