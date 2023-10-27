<script>
    var global_url = '<?= base_url('permohonan/') ?>';
    $('document').ready(function() {


    });

    function review(path) {
        console.log('path')
        var fileExt = path.split('.').pop().toLowerCase();

        if (fileExt === "pdf") {
            $("#fileContent").html(`<iframe src="${path}" width="100%" height="500px"></iframe>`);
        } else if (fileExt === "jpg" || fileExt === "jpeg" || fileExt === "png" || fileExt === "gif") {
            $("#fileContent").html(`<img src="${path}" alt="Image" width="50%">`);
        } else {
            $("#fileContent").html("Jenis file tidak didukung.");
        }

        $("#fileModal").modal("show");
    }



    $('.form').submit(function(event) {


        event.preventDefault();

        var formData = new FormData(this);
        var url = global_url + 'pengajuan';
        postFileWithAjax(url, formData, function(response, error) {
            if (error) {
                console.error(error);
            } else {

                if (response.status) {

                    success(response.msg);
                    new_location(global_url);
                } else {
                    fail(response.msg);
                }
            }

            after_load('Simpan');
        });
    });
</script>