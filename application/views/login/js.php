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


$('#togglePassword').on('click', function() {
    const passwordField = $('#password');
    const passwordFieldType = passwordField.attr('type');

    // Toggle the password field type
    passwordField.attr('type', passwordFieldType === 'password' ? 'text' : 'password');

    // Toggle the eye icon
    const eyeIcon = $(this).find('i');
    eyeIcon.toggleClass('fa-eye-slash fa-eye');
});
</script>