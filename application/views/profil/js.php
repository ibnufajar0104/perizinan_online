<script>
    var global_url = '<?= base_url('profil/') ?>';


    $('.form-profil').submit(function(event) {
        event.preventDefault();
        if (!this.checkValidity()) {
            return false;
        }
        var formData = $(this).serialize();
        var url = global_url + 'update';
        postWithAjax(url, formData, function(response, error) {
            if (error) {
                console.error(error);
            } else {
                if (response.status) {
                    showSuccessMessage(response.msg);
                } else {
                    showErrorMessage(response.msg);
                }
            }
            afterLoad('Simpan');
        });
    });
</script>