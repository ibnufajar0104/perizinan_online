<script>
var global_url = '<?= base_url('permohonan/') ?>';
$('document').ready(function() {


});

function review(path) {

    var fileExt = path.split('.').pop().toLowerCase();

    if (fileExt === "pdf") {
        $("#fileContent").html(`<iframe src="${path}" width="100%" height="500px"></iframe>`);
    } else if (fileExt === "jpg" || fileExt === "jpeg" || fileExt === "png" || fileExt === "gif") {
        $("#fileContent").html(`<img src="${path}" alt="Image" width="50%">`);
    } else {
        $("#fileContent").html("Jenis file tidak didukung.");
    }

    console.log(path);
    $("#fileModal").modal("show");
}






$('.form').submit(function(event) {


    event.preventDefault();

    if (!this.checkValidity()) {

        return false;
    }

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

$('.form-update').submit(function(event) {


    event.preventDefault();

    if (!this.checkValidity()) {

        return false;
    }

    var formData = new FormData(this);
    var url = global_url + 'update_pengajuan';
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

function detail() {
    $('#detailModal').modal('show');
}

function upload(id) {
    const fileInput = $("#" + id);
    const review = $("." + id);
    fileInput.click();

    fileInput.change(function() {
        const selectedFile = fileInput[0].files[0];
        if (selectedFile) {

            review.show();
        }
    })
}

function review_after_upload(id) {
    // Mendapatkan elemen input file
    var fileInput = $("#" + id)[0];;

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var fileExt = file.name.split('.').pop().toLowerCase();

        if (fileExt === "pdf") {
            var reader = new FileReader();

            reader.onload = function(e) {
                var blobContent = e.target.result;
                $("#fileContent").html(`<iframe src="${blobContent}" width="100%" height="500px"></iframe>`);
                $("#fileModal").modal("show"); // Show the modal
            };

            reader.readAsDataURL(file);
        } else if (fileExt === "jpg" || fileExt === "jpeg" || fileExt === "png" || fileExt === "gif") {
            var reader = new FileReader();

            reader.onload = function(e) {
                var blobContent = e.target.result;
                $("#fileContent").html(`<img src="${blobContent}" alt="Image" style="width: 50%;">`);
                $("#fileModal").modal("show"); // Show the modal
            };

            reader.readAsDataURL(file);
        } else {
            $("#fileContent").html("File type not supported.");
            $("#fileModal").modal("show"); // Show the modal with the error message
        }
    } else {
        $("#fileContent").html("Select a file first.");
        $("#fileModal").modal("show"); // Show the modal with the error message
    }
}
</script>