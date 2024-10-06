<script>
    var global_url = '<?= base_url('login/') ?>';
    $('.form-login').submit(function(e) {
        e.preventDefault(); // Menghentikan perilaku default dari form

        // Ambil token reCAPTCHA v3
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfrUFkqAAAAABIvZAv_0nQHiiAlmx5_nh5RyfoP', {
                action: 'login'
            }).then(function(token) {
                // Tambahkan token reCAPTCHA ke data form
                var formData = $('.form-login').serialize() + '&g-recaptcha-response=' + token;

                // Proses submit form menggunakan AJAX
                var url = global_url + 'form';
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