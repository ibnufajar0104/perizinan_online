<script>
var global_url = '<?= base_url('permohonan/') ?>';
$(document).ready(function() {
    $('.hide').hide();
    $('#ajukan').click(function() {
        if (!$('#pernyataan').is(':checked')) {
            $('#warning-msg').show(); // Tampilkan pesan jika belum dicentang
        } else {
            $('#warning-msg').hide(); // Sembunyikan pesan jika sudah dicentang
            $('#confirm-modal').modal('show');
        }

    })


    $('#form-resume').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();
        var url = global_url + 'afterResume';

        postWithAjax(url, formData, function(response, error) {
            if (error) {
                console.error(error);
            } else {
                if (response.status) {
                    showSuccessMessage(response.msg);
                    redirectTo(global_url);
                } else {
                    showErrorMessage(response.msg);
                    afterLoad('Yakin');
                    $('#confirm-modal').modal('hide');

                }
            }
        });
    });


});

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
</script>