<script>
var global_url = '<?= base_url('permohonan/') ?>';
$(document).ready(function() {
    // Ganti kondisi ini dengan pengecekan sebenarnya apakah "Informasi Umum" sudah selesai
    var isBerkasPersyaratan = false;

    // Mencegah perpindahan tab jika informasi umum belum selesai
    $(' #v-pills-messages-tab').on('show.bs.tab', function(event) {
        if (!isBerkasPersyaratan) {
            event.preventDefault(); // Mencegah tab untuk berpindah
            showErrorMessage('Selesaikan Berkas Persyaratan terlebih dahulu');
        }
    });

    window.upload = upload; // Pastikan fungsi upload tersedia di global scope
});

function upload(tblpersyaratan_id) {
    const fileInput = $("#" + tblpersyaratan_id);
    const progressBar = $('#progress-bar-' + tblpersyaratan_id);
    const uploadButton = $('.upload').filter(function() {
        // Temukan tombol upload berdasarkan tblpersyaratan_id yang sama
        return $(this).attr('onclick').includes(tblpersyaratan_id);
    });

    // Klik otomatis input file saat tombol upload diklik
    fileInput.click();

    // Tangkap event perubahan file
    fileInput.off('change').on('change', function() {
        const idPendaftaran = $('#idPendaftaran').val(); // Ambil nilai dari input ID Pendaftaran
        const file = fileInput[0].files[0]; // Ambil file yang dipilih

        if (!idPendaftaran) {
            alert('ID Pendaftaran harus diisi.');
            return;
        }

        if (!file) {
            alert('Pilih file terlebih dahulu.');
            return;
        }

        // Nonaktifkan tombol upload dan input file selama proses upload
        uploadButton.prop('disabled', true);
        fileInput.prop('disabled', true);

        // Buat FormData
        var formData = new FormData();
        formData.append('idPendaftaran', idPendaftaran); // Tambahkan ID Pendaftaran ke FormData
        formData.append('tblpersyaratan_id', tblpersyaratan_id);
        formData.append('file', file); // Tambahkan file ke FormData

        // AJAX request untuk upload file
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                // Event listener untuk menangani progres
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);

                        // Update progress bar
                        progressBar.css('width', percentComplete + '%');
                        progressBar.attr('aria-valuenow', percentComplete);
                        progressBar.text(percentComplete + '%');
                    }
                }, false);

                return xhr;
            },
            url: '<?= site_url('permohonan/uploadPersyaratan') ?>', // Gantilah dengan URL sesuai route CodeIgniter Anda
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                // Tampilkan pesan sukses/gagal
                if (response.status) {
                    showSuccessMessage(response.msg);
                    $('.review.' + tblpersyaratan_id).show(); // Tampilkan tombol review
                } else {
                    showErrorMessage(response.msg);
                }

                // Reset progress bar
                progressBar.css('width', '0%');
                progressBar.attr('aria-valuenow', '0');
                progressBar.text('0%');

                // Aktifkan kembali tombol upload dan input file
                uploadButton.prop('disabled', false);
                fileInput.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                showErrorMessage('Terjadi kesalahan saat mengunggah file.');

                // Reset progress bar
                progressBar.css('width', '0%');
                progressBar.attr('aria-valuenow', '0');
                progressBar.text('0%');

                // Aktifkan kembali tombol upload dan input file
                uploadButton.prop('disabled', false);
                fileInput.prop('disabled', false);
            }
        });
    });
}






function review_after_upload(id) {
    var fileInput = $("#" + id)[0];

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var fileExt = file.name.split('.').pop().toLowerCase();

        var reader = new FileReader();
        reader.onload = function(e) {
            var blobContent = e.target.result;

            if (fileExt === "pdf") {
                $("#fileContent").html(`<iframe src="${blobContent}" width="100%" height="500px"></iframe>`);
            } else if (["jpg", "jpeg", "png", "gif"].includes(fileExt)) {
                $("#fileContent").html(`<img src="${blobContent}" alt="Image" style="width: 50%;">`);
            } else {
                $("#fileContent").html("Jenis file tidak didukung.");
            }

            $("#fileModal").modal("show");
        };

        reader.readAsDataURL(file);
    } else {
        $("#fileContent").html("Pilih file terlebih dahulu.");
        $("#fileModal").modal("show");
    }
}

function review(path) {
    var fileExt = path.split('.').pop().toLowerCase();

    if (fileExt === "pdf") {
        $("#fileContent").html(`<iframe src="${path}" width="100%" height="500px"></iframe>`);
    } else if (["jpg", "jpeg", "png", "gif"].includes(fileExt)) {
        $("#fileContent").html(`<img src="${path}" alt="Image" width="50%">`);
    } else {
        $("#fileContent").html("Jenis file tidak didukung.");
    }


    $("#fileModal").modal("show");
}


$('.berkas-persyaratan').submit(function(event) {
    event.preventDefault();

    var formData = $(this).serialize();
    var url = global_url + 'afterUploadPersyaratan';

    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {
            if (response.status) {
                showSuccessMessage(response.msg);
                redirectTo(global_url + 'resume/' + response.id)
            } else {
                showErrorMessage(response.msg);
                afterLoad('Lanjut')
            }
        }
    });
});
</script>