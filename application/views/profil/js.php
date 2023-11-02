<script>
    var global_url = '<?= base_url('profil/') ?>';


    $('.form-profil').submit(function(event) {


        event.preventDefault();

        if (!this.checkValidity()) {

            return false;
        }

        var formData = new FormData(this);
        var url = global_url + 'update';
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