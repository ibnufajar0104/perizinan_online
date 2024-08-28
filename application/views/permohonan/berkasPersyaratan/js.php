<script>
var global_url = '<?= base_url('permohonan/') ?>';
$(document).ready(function() {
    // Ganti kondisi ini dengan pengecekan sebenarnya apakah "Informasi Umum" sudah selesai
    var isInformasiUmumSelesai = false;

    // Mencegah perpindahan tab jika informasi umum belum selesai
    $(' #v-pills-messages-tab').on('show.bs.tab', function(event) {
        if (!isInformasiUmumSelesai) {
            event.preventDefault(); // Mencegah tab untuk berpindah
            showErrorMessage('Selesaikan Berkas Persyaratan terlebih dahulu');
        }
    });


});


function upload(id) {
    const fileInput = $("#" + id);
    const review = $("." + id);
    fileInput.click();

    fileInput.change(function() {
        const selectedFile = fileInput[0].files[0];
        if (selectedFile) {
            review.show();
        }
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

    console.log(path);
    $("#fileModal").modal("show");
}
</script>