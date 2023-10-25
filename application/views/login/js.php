<script>
var global_url = '<?= base_url('login/') ?>';
$('.form-login').submit(function(e) {

    event.preventDefault(); // Menghentikan perilaku bawaan formulir (misalnya, mengirimkan permintaan GET)

    var url = global_url + 'form'
    var formData = $(this).serialize();
    postWithAjax(url, formData, function(response, error) {
        if (error) {
            console.error(error);
        } else {


            if (response.status) {

                success(response.msg);
                new_location('<?= site_url('permohonan') ?>');
            } else {
                fail(response.msg);
            }


        }

        after_load('Login');
    });

});
</script>